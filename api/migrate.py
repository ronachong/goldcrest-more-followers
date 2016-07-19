from peewee import *
from app.models import *

def create_tables():
    db_tables = [
                ]

    try:
        base.db.create_tables(db_tables, safe=True)
    except peewee.OperationalError:
        pass

create_tables()

