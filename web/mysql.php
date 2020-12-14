<?php
$mysqli = new mysqli('mysql', 'user', 'password', 'database');

if ($mysqli->connect_errno) {
    printf("Не удалось подключиться: %s<br>", $mysqli->connect_error);
    exit();
}

if ($mysqli->query("CREATE TABLE my_table (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50))") === TRUE) {
    printf("Таблица my_table успешно создана.<br>");
}
else {
    printf("Ошика базы: %s", $mysqli->error);
}

$names = ['один', 'два', 'три'];
foreach ($names as $name) {
    if ($mysqli->query(sprintf("INSERT INTO my_table (name) VALUES(\"%s\")", $name)) === TRUE) {
        printf("Запись успешно вставлена.<br>");
    }
    else {
        printf("Ошика базы: %s", $mysqli->error);
    }
}

if ($result = $mysqli->query("SELECT * FROM my_table")) {
    while($obj = $result->fetch_object()){
	printf("Строка: id=%s, name=%s<br>", $obj->id, $obj->name);
   }
}
$result->close();

if ($mysqli->query("DROP TABLE my_table") === TRUE) {
    printf("Таблица my_table успешно удалена.<br>");
}
else {
    printf("Ошика базы: %s", $mysqli->error);
}

mysqli_close($mysqli);
