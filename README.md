# webstart

0) preparation
  - install git
  - install docker
  - install docker-compose 
  
1) build environment
  - clone project ???. addtional you can set name of folder instead of repository
    git clone <URL> [path]
  - cd [part]
  - copy .env.sample into .env
  - edit .env (you should set unused ports to prevent conflicts)
    * HTTP_PORT - site will be available on this port (http://localhost:{HTTP_PORT})
    * MYSQL_PORT - port for mysql, if you will need to use MySQL WorkBench for example
    * PASSWORD - password for mysql
  - build docker images (execute in folder of project!!!)
    # docker-compose build
    (build process can be done in 10 minutes)
  
 2) execute project environment (docker)
    # docker-compose up -d
   
 3) access to site:
    - enter in address line of browser (port from .env, 9080 by default):
      # http://localhost:9080
    - access to phpMyAdmin - /phpmyadmin/ ('/' at the end is required) 
      # http://localhost:9080/phpmyadmin/
      
 4) create site
    - DocumentRoot is 'web'
    - index.php contain only phpmyadmin();
    
 5) connect to DB
    - you can use PDO or mysqli
    - example for mysqli is in mysql.php
      * connect to DB
      * create table
      * insert and delete table
      * drop table
      
      
    
