<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 12:14
 */
$xml=simplexml_load_file("note.xml");
echo $xml->getName(), "<br/>";
foreach ($xml->children() as $child) {
    echo $child->getName(),":",$child,"<br>";
}