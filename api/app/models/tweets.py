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
            'tweet_id': self.tweet_id,
            'user_id': self.user_id_id,
        }

        return hash