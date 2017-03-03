<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 16:34
 */
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='test';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='root';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
$tableName = 'pages';
try {
    $dbh = new PDO($dsn, $user, $pass,
        array(PDO::ATTR_PERSISTENT => true));
    echo "Connected\n";
} catch (Exception $e) {
    die("Unable to connect: " . $e->getMessage());
}
try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //开启事务
    $dbh->beginTransaction();
    $dbh->exec("insert into pages values ('001', 'aaa')");
    $dbh->exec("insert into pages values ('002', 'bbb')");
    //提交
    $dbh->commit();

} catch (Exception $e) {
    //回滚
    $dbh->rollBack();
    echo "Failed: " . $e->getMessage();
}