from peewee import *
from config import *
from secret import *
from datetime import datetime

# commented out arguments are for accessing actual remote
# database.
db = MySQLDatabase(
    host=DATABASE['host'],
    port=DATABASE['port'],
    charset=DATABASE['charset'],
    user=DATABASE['user'],
    database=DATABASE['database'],
    password=PASSWORD
    )

class BaseModel(Model):
    class Meta(type):
        database = db
        order_by = ("id", )    

    id = PrimaryKeyField(unique=True)

    
    

    