<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/2
 * Time: 18:52
 */
function br()
{
    echo "<br/>";
}
$year = '2012';
$month = '11';
@$begin_time = strtotime($year . $month . "01");
@$end_time = strtotime("+1 month", $begin_time);
echo $begin_time;
br();
echo $end_time;
br();
echo "<pre>";
var_export(array(array('gt',$begin_time),array('lt',$end_time)));
echo "</pre>";