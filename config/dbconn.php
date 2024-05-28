<?php 

//host
define('HOST', 'localhost');

//dbname
define('DBNAME', 'pay' );

//password
define('PASS', '');

//USER
define('USER', 'root');

$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",USER ,PASS);

//checking if the connection was succesful
if (!$conn) {
echo "Connection Failed";
} else {
    echo "Connection Successful!";
}












