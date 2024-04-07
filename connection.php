<?php 
#connecting to database 
$servername = "localhost";
$username ="root";
$password ="";
// $database ="hrm";

$dbconnection = new mysqli($servername,$username,$password);
//check whether database exists or not 
$dbexists = "SELECT SCHEMA_NAME             
FROM INFORMATION_SCHEMA.SCHEMATA
WHERE SCHEMA_NAME = 'cloud'";

//firing command
$result = $dbconnection->query($dbexists);

if($result->num_rows == 0){
    // Create Database
    $database = "cloud";
    $db_query = "CREATE DATABASE ".$database.";";
    $dbconnection->query($db_query);
    // Select Database
    $dbconnection->select_db($database);
    // Create Table
    $create_table = "
    create table details(
        id int  AUTO_INCREMENT PRIMARY KEY,
        username varchar(80) DEFAULT NULL,
        password varchar(80) DEFAULT NULL
    );
    ";
    //fire create table code
    $dbconnection->query($create_table);
    $add_value="
    INSERT INTO details(username,password) values('login','login123');";
    $dbconnection->query($add_value);

    // $e_insert="INSERT INTO employee(payment_details,status,amount) values('----','Pending','----');";
    // $dbconnection->query($e_insert);
}
    
//if database exist or created select database
$dbconnection->select_db("cloud");


if ($dbconnection -> connect_errno) {    
    echo "Failed to connect to MySQL: " .$mysqli -> connect_error;
    exit();     
}
?>  