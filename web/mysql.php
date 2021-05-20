<?php
$mysqli = new mysqli('mysql', 'user', 'password', 'database');

if ($mysqli->connect_errno) {
    printf("Can't connect: %s<br>", $mysqli->connect_error);
    exit();
}

if ($mysqli->query("CREATE TABLE my_table (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50))") === TRUE) {
    printf("Table my_table created.<br>");
}
else {
    printf("Database error: %s", $mysqli->error);
}

$names = ['one', 'two', 'three'];
foreach ($names as $name) {
    if ($mysqli->query(sprintf("INSERT INTO my_table (name) VALUES(\"%s\")", $name)) === TRUE) {
        printf("Record inserted.<br>");
    }
    else {
        printf("Database error: %s", $mysqli->error);
    }
}

if ($result = $mysqli->query("SELECT * FROM my_table")) {
    while($obj = $result->fetch_object()){
	printf("Row: id=%s, name=%s<br>", $obj->id, $obj->name);
   }
}
$result->close();

if ($mysqli->query("DROP TABLE my_table") === TRUE) {
    printf("Table my_table deleted.<br>");
}
else {
    printf("Database error: %s", $mysqli->error);
}

mysqli_close($mysqli);
