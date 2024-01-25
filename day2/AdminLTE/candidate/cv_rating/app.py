import mysql.connector
from flask import Flask, jsonify, request, session, redirect, url_for, render_template, send_file
from bson import ObjectId
from waitress import serve
from datetime import datetime, timedelta
from flask_cors import CORS
import re
import pytesseract
from functools import wraps
from PIL import Image
import uuid
import os
revoked_tokens = []
import PyPDF2
from flask_bcrypt import Bcrypt
import dotenv
import openai
from dotenv import load_dotenv
import jwt
import random
load_dotenv()

api_key = os.getenv("OPEN_AI")

openai.api_key = api_key
# Replace these with your database credentials
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'tnm_portal'
}



token = "your_jwt_token"  # Replace with your JWT
secret_key = "your_secret_key"
algorithm = "HS256"
exp= datetime.utcnow() + timedelta(hours=2)
load_dotenv()


app = Flask(__name__)
CORS(app, supports_credentials=True)
app.secret_key ="srevvhhhff"
app.config['UPLOAD_FOLDER'] = os.path.join(os.getcwd(), 'uploads')
bcrypt = Bcrypt(app)


os.makedirs(app.config['UPLOAD_FOLDER'], exist_ok=True)


import functools
from flask import jsonify
        # Attempt to establish a connection
conn = mysql.connector.connect(**db_config)
cursor = conn.cursor()
def extract_numbers(text):
    numbers = re.findall(r'\b\d+\b', text)
    return [int(number) for number in numbers][0]

@app.route('/')
def index():
    file_path = os.path.join(app.config['UPLOAD_FOLDER'], "studyhacks-docs.pdf")
    return send_file(file_path)


# UpLOAD pDF
@app.route('/pdfs', methods=['POST'])
def upload_pdf():
    print(request.files['cv'].filename)
    email=request.form.get('email')
    user_id=request.form.get('user_id')
    job_id=request.form.get('job_id')
    fullname=request.form.get('fullname')
    status = request.form.get('status') if request.form.get('status') else "pending"

    
    # cv_file_path=request.form.get('cv_file_path')
    # cover_letter_file_path=request.form.get('cover_letter_file_path')
    select_query="SELECT * FROM job_applications WHERE user_id = {} AND job_id = {}".format(user_id, job_id)
    cursor.execute(select_query)
    result = cursor.fetchone()
    if(result):
        return jsonify({"message":"already applied for this job"})

    if 'cv' not in request.files:
        return "No file part", 400
    
    
    cv = request.files['cv']
    
    if cv.filename == '':
        return "No selected file", 400
    unique_id = uuid.uuid4()
    _id = str(ObjectId())
    pdf_loc=os.path.join(app.config['UPLOAD_FOLDER'],  str(unique_id)+".pdf")
    cv.save(pdf_loc)
    extracted_text = extract_text_from_pdf(pdf_loc)
    data = {}
    select_query = """
    SELECT * FROM tnm_portal.jobs WHERE job_id = {};
    """.format(job_id)
        
    cursor.execute(select_query)
    result = cursor.fetchall()

    title=list(result[0])[1:][0]
    description=list(result[0])[1:][1]
    qualifications=list(result[0])[1:][2]
    responsibility=list(result[0])[1:][3]
    cv_file_path="/uploads"+cv.filename
    cover_letter_file_path="uploads/cover_letter.pdf"
    details="title: "+title+", description: "+description+", qualifications: "+qualifications+ ", and responsibility: "+responsibility
    question = "out of 100, what is the score of this cv :{},  to these job requirements:{} ".format(extracted_text,details)
    response = openai.Completion.create(
    engine="gpt-3.5-turbo-instruct",  # Choose an appropriate engine
    prompt=question,
    max_tokens=150  # Adjust as needed
    )
    answer = response.choices[0].text.strip()
    
    print(answer)


    def generate_7_digit_code():
        return ''.join(random.choices('0123456789', k=7))

    # Example usage:
    code = generate_7_digit_code()



    
    insert_query = """
    INSERT INTO job_applications (application_code, user_id, job_id, fullname, email, cv_file_path, cover_letter_file_path,score,status)
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s)
    """
    cursor.execute(insert_query, (code, user_id, job_id, fullname, email, cv_file_path, cover_letter_file_path,extract_numbers(answer),status))
    conn.commit()
    return str(extract_numbers(answer))
        

def extract_text_from_pdf(pdf_file_path):
    try:
        text = ''
        with open(pdf_file_path, 'rb') as pdf_file:
            pdf_reader = PyPDF2.PdfReader(pdf_file)
            pages = pdf_reader.pages
            for page_number in range(len(pages)):
                page = pdf_reader.pages[page_number]
                text += page.extract_text()
            return text
    except Exception as e:
        return text

if __name__ == "__main__":
    serve(app, host="0.0.0.0", port=8080)

