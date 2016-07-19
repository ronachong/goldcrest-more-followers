from peewee import *
from app.models import *

def create_tables():
    db_tables = [
            tweets.Tweet,
            user.User]

    try:
        base.db.create_tables(db_tables, safe=True)
    except:
        pass

create_tables()
