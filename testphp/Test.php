<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 16:17
 */
function br()
{
    echo "<br/>";
}
echo "testphp.com";
br();
$a = 123;
$b = 12;
/*


printf("%6.3f,%4d",$a,$b);
br();
echo gettype(1);
br();
echo gettype(false);
br();
echo gettype(1.2);
br();
echo gettype("hello");
br();
echo gettype(__FILE__);
br();
echo gettype($_SERVER);
br();
echo gettype(array());
br();
echo gettype(new Person());
br();
echo gettype(null);*/
$data = array(
    0 => array("a" => "orange",
               "b" => "banana",
               "c" => "apple"
    ),
    1 => array(1, 2, 3, 4, 5, 6),
    2 => array("first", 5 => "second", "third")
);

$data[3]['id'] = '30';
$data[3]['content'] = "phperwei31";
// 访问二维数组的方法


/*// 把 PHP 数组转成 JSON 字符串
$json_string = json_encode($data);
echo $json_string;

// 写入文件
file_put_contents('test.json', $json_string);*/
?>

<?php
// 从文件中读取数据到 PHP 变量
$json_string = file_get_contents('test.json');

// 把 JSON 字符串转成 PHP 数组
//$data = json_decode($json_string, true);

// 显示出来看看
echo "<pre>";
//var_export($data);
echo "</pre>";

class Base
{
    public $public = "public";
    protected $protected = "protected";
    private $private = "private";

    function show()
    {
        echo $this->public;
        br();
        echo $this->protected;
        br();
        echo $this->private;
        br();
    }

    function getPrivate()
    {
        return $this->private;
    }
}

class Child extends Base
{
    public $public = "public in Child";
    protected $protected = "protected in Child";

//    private $private = "private in Child";

    function show()
    {
        echo $this->public;
        br();
        echo $this->protected;
        br();
        $private = parent::getPrivate();
        echo $private;
//        echo $this->private;
//        br();
    }
}

$obj = new Child();
$obj->show();

interface Fly
{
    const PI = 23;

    function fly();
}

class Man implements Fly
{

    /**
     *
     * @param
     * @access
     */
    public function fly()
    {

    }
}


/*class Person{
    private $name;
    private $sex;
    private $age;

    //构造方法在对象诞生时为成员属性付初值
    function __construct($name="",$sex="",$age=1){
        $this ->name = $name;
        $this ->sex = $sex;
        $this ->age = $age;
    }

    //一个成员方法用于打印出自己对象中全部的成员属性值
    function say() {
        echo "我的名字：".$this ->name."，性别：".$this ->sex."，年龄：".$this ->age."<br>";
    }

    function __clone()
    {
        $this->name= "lxm";
        $this->age = 25;
    }
}

$p1 = new Person("张三","男",20);
$p2 = clone $p1;

		$p1 ->say();          //调用源对象中的说话方法，打印原对象中全部属性值
		$p2 ->say();*/
