import jwt
import base64
import os

from flask_json import FlaskJSON
from functools import wraps
from flask import Flask, request, jsonify, _request_ctx_stack
from werkzeug.local import LocalProxy
from dotenv import Dotenv
from flask.ext.cors import cross_origin

env = None

try:
    env = Dotenv('./.env')
    client_id = env["AUTH0_CLIENT_ID"]
    client_secret = env["AUTH0_CLIENT_SECRET"]
except IOError:
  env = os.environ

app = Flask(__name__)
app.config['JSON_ADD_STATUS'] = False
json = FlaskJSON(app)

'''Imports all views'''
from views import *
