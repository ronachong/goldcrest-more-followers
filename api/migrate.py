from peewee import *
from app.models import *

@cross_origin()
def create_tables():
    db_tables = [
            tweets.Tweet,
            user.User]

    try:
        base.db.connect()
        base.db.create_tables(db_tables, safe=True)
        base.db.close()
    except:
        pass

#create_tables()

