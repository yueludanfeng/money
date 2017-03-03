<?php
function br()
{
    echo "<br/>";
}
echo "--------------------Test Php Json example----------------";
$tipi[0] = 'php-internal';
$tipi[1] = 'php-internal';
$tipi[2] = 'php-internal';
var_dump(memory_get_usage());

$copy = $tipi;

//xdebug_debug_zval('tipi', 'copy');
var_dump(memory_get_usage());

$copy[0] = 'php-internal';
//xdebug_debug_zval('tipi', 'copy'); 
var_dump(memory_get_usage());
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);

class Person
{
    public $body;
    public $id;

    function getBody()
    {
        return $this->body;
    }


    function setBody($body)
    {
        $this->body = $body;
    }
}

//$obj = new Person("lxm",12);
$obj = new Person();
$obj->id = "lxm";
$obj->body = "body";
br();
echo json_encode($obj);
br();
echo "---------------Test xdebug_debug_zval() function--------------";
//参考文献:http://php.net/manual/zh/features.gc.refcounting-basics.php
br();

$str = "string";
xdebug_debug_zval('str');
br();

$a = "new string";
$b = $a;
xdebug_debug_zval('a');
br();


$a = "new string";
$b = $a;
$c = &$a;
xdebug_debug_zval('a');
br();


$ta = "new string";
$tc = $tb = &$ta;
xdebug_debug_zval('ta');//(refcount=2, is_ref=1),string 'new string' (length=10)
unset($tb, $tc);
xdebug_debug_zval('ta');//(refcount=1, is_ref=0),string 'new string' (length=10)
//因此，refcount为1时，is_ref为0； refcount>1时，is_ref为1；
br();
echo "body=" . $obj->body;
br();
echo "------------test refcount and is_ref os array----------------<br>";
$a = array('meaning' => 'life', 'number' => 42);
xdebug_debug_zval('a');

$demoa = array('one');
$demoa[] = $demoa;
xdebug_debug_zval('demoa');

$demob = array('one');
$demob[] = &$demob;
xdebug_debug_zval('demob');

echo "------------------------Test Json encode and Json decode-----<br>";
//json_encode()是将对象或数组转换为json对象； json_decode() 是将json对象解析为数组或对象
$bad_json = "{ 'bar': 'baz'}";
$bad_json = '{ "bar": "baz" }';
var_export(json_decode($bad_json));
//var_dump(json);
br();
echo "------------------------------Test string concat function----------<br>";
$s = "";
$s.= "hello";
echo $s;
br();

echo "----------------------test array_map() function-------------<br/>";
$data = array(
    array(
        'a' => 'first a',
        'b' => 'first b'
    ),
    array(
        'a' => 'second a',
        'b' => 'second b'
    )
);

$array_column = array_map(function($element){
    return $element['a'];
}, $data);

print_r($array_column);
