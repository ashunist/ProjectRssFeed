
CREATE TABLE myrss(article_id INT NOT NULL AUTO_INCREMENT ,article_title varchar(255) NOT NULL,
article_link varchar(255) NOT NULL
,article_description TEXT NOT NULL,article_time  DATETIME DEFAULT  '0000-00-00 00:00:00' 
 NOT NULL,PRIMARY KEY(article_id) )