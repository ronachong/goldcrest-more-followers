
from app.models.user import User
from flask_json import as_json, request
from app import app
from datetime import datetime
from flask import abort

@app.route('/users/<user_id>', methods=['GET'])
@as_json
def get_user(user_id):
    abort(404)
