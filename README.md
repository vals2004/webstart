# webstart

0) подготовка
  - установить docker
  - установить docker-compose 
  - установить git
  
1) сборка окружения
  - клонируем проект ???. дополнительно можно указать имя папки проекта вместо имени репозитория
    git clone <URL> [path]
  - переходим в папку
  - копируем файл .env.sample в .env
  - редактируем .env (в первую очередь чтобы знать какой порт использовать и избежать конфликтов)
    * HTTP_PORT - на этом порту будет доступен сайт (http://localhost:{HTTP_PORT})
    * MYSQL_PORT - порт mysql, если будет необходимость использовать внешний доступ
    * PASSWORD - пароль пользователей mysql
  - выполняем непосредственно сборку окружения (запускаем в папке проекта!!!)
    # docker-compose build
    сборка может занять до 10 минут
  
 2) запуск окружения
    # docker-compose up -d
   
 3) взаимодействие через браузер:
    - для доступа к сайту в браузере обращаемся к localhost и указываем порт из .env (по умолчанию 9080):
      # http://localhost:9080
    - для доступа к phpMyAdmin добавляем путь  /phpmyadmin/ и получаем (слеш в конце обязательно) 
      # http://localhost:9080/phpmyadmin/
      
 4) создание сайта
    - DocumentRoot сайта находится в папке web
    - index.php по умолчанию содержит единственную конструкцию phpmyadmin();
    
 5) подключение к базе данных
    - можно использовать PDO или mysqli
    - пример для mysqli находится в файле mysql.php
      * подключение к базе данных
      * создание таблицы
      * вставка и выборка данных
      
      
    
