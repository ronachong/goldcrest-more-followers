from peewee import *
from base import BaseModel
import hashlib
from datetime import datetime

'''
User defines a user object which contains information
about each user in the database.
'''
class User(BaseModel):
    user_id = CharField(128, null=False, unique=True)
    email = CharField(128, null=False, unique=True)
    password = CharField(128, null=False)
    name = CharField(128, null=False)
    keyword = CharField(128, null=False)
    is_active = BooleanField(default=False)
    created_at = datetime.now().strftime("%Y/%m/%d %H:%M:%S")
    access_token = CharField(512, null=False)
    access_token_secret = CharField(512, null=False)

    def to_hash(self):
        hash = {
            'user_id': self.user_id,
            'created_at': self.created_at,
            'email': self.email,
            'name': self.name,
            'is_active': self.is_admin,
            'keyword': self.keyword,
            'access_token': self.access_token,
            'access_token_secret': self.access_token_secret
        }

        return hash
