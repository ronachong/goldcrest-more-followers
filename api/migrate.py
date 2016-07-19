from peewee import *
from app.models.tweets import Tweet
from app.models.user import User

def create_tables():
    db_tables = [
            Tweet,
            User]

    try:
        base.db.create_tables(db_tables, safe=True)
    except:
        pass

create_tables()
