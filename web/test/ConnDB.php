<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/27
 * Time: 16:25
 */

//get connection info
$conn_info = parse_ini_file("db_conn_info.ini");
define("HOST_NAME", $conn_info['hostname']);
define("DB_NAME", $conn_info['dbname']);
define("USER_NAME", $conn_info['username']);
define("PASSWORD", $conn_info['password']);

$link = mysqli_connect(HOST_NAME,USER_NAME,PASSWORD);
if(!$link){
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($link, DB_NAME);
$table_name = "pages";
$sql = "select * from $table_name";

$result = mysqli_query($link, $sql);
if(!$result){
    die('Could not query: ' . mysqli_error());
}
echo "<ol style='type: 1'>";
while($row = mysqli_fetch_array($result))
{
    echo "<li>{$row['code']}:{$row['description']}</li>";
}
echo "</ol>";

