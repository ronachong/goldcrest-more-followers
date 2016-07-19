CREATE DATABASE twitter_bot_service
       DEFAULT CHARACTER SET utf8
       DEFAULT COLLATE utf8_general_ci;

CREATE USER 'airbnb_user_prod'@'localhost' IDENTIFIED BY 'holberton1';

GRANT ALL PRIVILEGES ON twitter_bot_service.*
      TO 'admin'@'localhost' IDENTIFIED BY 'holberton1';

FLUSH PRIVILEGES;