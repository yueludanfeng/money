<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/27
 * Time: 19:39
 */
class ConnDatabase
{


    private $hostname ="";
    private $dbname = "";
    private $username = "";
    private $password = "";

    function __construct($hostname, $dbname, $username, $password)
    {
        $this->hostname = $hostname;
        $this->dbname   = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    function connDatabase()
    {
        $link = mysqli_connect($this->hostname,$this->username,$this->password);
        mysqli_select_db($link, $this->dbname);
        return $link;
    }

    function execute($sql)
    {
        $link = $this->connDatabase();
        $result = mysqli_query($link, $sql);
        return $result;
    }


}

