import os

airbnb_env = os.environ.get('AIRBNB_ENV')

DATABASE = {
    'host': "localhost",
    'port': 3306,
    'charset': "utf8",

}


DEBUG = True
HOST = "localhost"
PORT = 3333
DATABASE['user'] = "admin"
DATABASE['database'] = "twitter_bot_service"
DATABASE['password'] = "holberton1"


    
