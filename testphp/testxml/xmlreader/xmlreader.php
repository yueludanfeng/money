<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 10:50
 */
$reader = new XMLReader();
$reader->open('xmlreader.xml');                                                     //读取xml数据
$i = 0;
while ($reader->read()) {                                                              //是否读取
    if ($reader->nodeType == XMLReader::TEXT) {               //判断node类型
        if (++$i % 3) {
            echo $reader->value . "\t";                                                                  //取得node的值
        } else {
            echo $reader->value . "<br>";
        }
    }
}

