from peewee import *
from base import BaseModel
from users import User 

class Tweet(BaseModel):
    tweet_id = IntegerField(unique=True)
    user_id = ForeignKeyField(
        User,
        related_name="user",
        on_delete="CASCADE"
    )

    def to_hash(self):
        hash = {
            'id': self.id,
            'created_at': self.created_at,
            'updated_at': self.updated_at,
            'name': self.name,
            'state_id': self.state_id
        }

        return hash