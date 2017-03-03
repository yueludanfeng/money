<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/27
 * Time: 18:32
 * Function:从文件中读取数据，然后将数据写入数据库中
 */
require_once("./ConnDatabase.php");
$data = parse_ini_file("./db_conn_info.ini");
$databaseObj = new ConnDatabase($data['hostname'],$data['dbname'],$data['username'],$data['password']);
$link = $databaseObj->connDatabase();

//打开文件
$fp= fopen("test.txt","r");
//$str = fread($fp,10);
while($line=fgets($fp))
{
    $values = explode(' ',$line);
    $sql = "insert into pages values('".$values[0]."','".$values[1]."')";
    echo $sql."<br>";
    $result = mysqli_query($link, $sql);
    echo "result=$result<br>";
}
fclose($fp);
echo "successfully";
