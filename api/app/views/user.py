
from app.models.user import User
from flask_json import as_json, request
from app import app
from datetime import datetime
from flask import abort

@app.route('/users', methods=['POST'])
@as_json
def get_user():
    ''' Creates a new user '''
    data = request.get_json()
    
    return {"message": "Hello World"}, 200
