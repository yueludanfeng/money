<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/18
 * Time: 19:17
 */

/**
 * Class BaseClass
 * 子类继承父类时，如果不写构造方法，则会继承父类的构造方法；
 * 如果写构造方法，则不会继承父类的构造方法;
 * 因此此时如果要使用父类的构造方法就要使用parent::__construct()来进行调用
 */
class BaseClass {
    function __construct() {
        print "In BaseClass constructor<br>";
    }
}

class SubClass extends BaseClass {
    function __construct() {
        parent::__construct();
        print "In SubClass constructor<br>";
    }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
//$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();



class human{

    private function t(){
    }

// 魔术方法__call
    /*
    $method 获得方法名
    $arg 获得方法的参数集合
    */
    public function __call($method,$arg){
        echo '你想调用我不存在的方法',$method,'方法 <br/>';
        echo '还传了一个参数 <br/>';
        echo print_r($arg),'<br/>';
    }
// 魔术方法__callStatic
    public static function __callStatic($method,$arg){

        echo '你想调用我不存在的',$method,'静态方法 <br/>';
        echo '还传了一个参数 <br/>';
        echo print_r($arg),'<br/>';
    }

}

$li=new human();
$li->say(1,2,3);
/*
调用一个未定义的方法
Fatal error: Call to undefined method human::say() in D:\wamp\www\php\59.php on line 8
*/

$li->t('a','b');
/*
__call 是调用不可见 (不存在或无权限) 的方法时, 自动调用
$lisi->say(1,2,3);----- 没有 say() 方法 ----> __call('say',array(1,2,3)) 运行
*/

human::cry('痛哭','鬼哭','号哭');
/*
__callStatic 是调用不可见的静态方法时, 自动调用.
Human::cry('a','b','c')---- 没有 cry 方法 ---> Human::__callStatic('cry',array('a','b','c'));
*/
$arr = [1,"a",'hello'];
foreach ($arr as $key=>$value)
{
    echo $key."=>".$value."<br/>";
}
$a = null;
if(!$a)
{
    echo "\$a is null";
}
function br()
{
    echo "<br/>";
}
echo $a==false;
br();
echo $a==0;
br();
echo "isset()";
echo isset($a)==null;
br();
$a = 2;
echo isset($a);
echo 'hello world';
echo "hello world";
br();
var_dump($arr);
br();
var_dump($arr);

?>
<?php foreach ($arr as $value):?>
    value=<?php echo $value; ?><br>
<?php endforeach; ?>
<?php
$var1 = 1;
$var2 = 2;
function test1(){
    $GLOBALS['var2'] = &$GLOBALS['var1'];
}
test1();
echo $var2 . "<br />";

$var3 = 1;
$var4 = 2;
function test2(){
    global $var3,$var4;
    echo "\$var3=$var3";
    br();
    echo "\$var4=$var4";
    br();
    $var4 = &$var3;
    echo "\$var4=$var4";
    br();
}
test2();
echo $var4 . "<br />";
$a="ABC";
$b =&$a;
echo $a;//这里输出:ABC
br();
echo $b;//这里输出:ABC
br();
$b="EFG";
echo $a;//这里$a的值变为EFG 所以输出EFG echo $b;//这里输出EFG
br();
class fooclass{
    public $att ;
}
$a = new fooclass();
$b = $a;//PHP中对象的赋值就相当于普通变量的引用
$a->att = 1;
$b->att = 2;
echo 'a obj:',($a->att),'<br>';
echo 'b obj:',($b->att);
$t1 = 1;
$t2 = 2;
$t2 = &$t1;
br();
echo "\$t2=$t2";
$a="Hello";    // $a 分配内存地址 0x00001，并赋值 Hello 。
$b=&$a;        // $b 分配内存地址 0x00002，并将该地址指向 0x00001 。
$b="word";     // 为 0x00001 地址赋值 word
echo $a,$b;
echo gettype($a);
$var1 = 1;
function Test_1(){
    unset($GLOBALS['var1']);
}
Test_1();
br();
echo $var1 . "<br />";
br();

$var2 = 1;
function Test_2(){
    echo "---enter into function Test_2()<br>";
    global $var2;
    unset($var2);
}
Test_2();
echo $var2;//ouput :  1
br();

function Test_3()
{
    echo "---enter into function Test_3()<br>";
    $var3= $GLOBALS['var2'];
    echo $var3;
    unset($var3);
}
Test_3();
br();


function Test_4()
{
    echo "---enter into function Test_4()<br>";
    $var4= &$GLOBALS['var2'];
    echo $var4;
    unset($var4);
}
Test_4();
br();
function Test_change_global_variable()
{
    global $var2;
    $var2 = 4;
    echo $var2;
}
br();
Test_change_global_variable();
echo $var2;
br();

//函数引用
function testRef(&$a){
    echo $a;
    br();
    $a = 10;
}
br();
$b = 5;
testRef($b);
echo "\$b=$b";
br();

$arr_1 = [1,2,3];
$arr_2 = $arr_1;
$arr_2[0] = 2;
foreach ($arr_1 as $value)
{
    echo "value_of_arr1=".$value."<br>";
}

foreach ($arr_2 as $value)
{
    echo "value_of_arr2=".$value."<br>";
}
class A{}
$a = new A();
echo gettype($a);
br();
echo gettype($arr_1);
br();
echo gettype($arr_1);
br();

function   & test()
{
    static   $b = 0 ; // 申明一个静态变量
    $b = $b + 1 ;
    echo   $b ;
    br();
    return   $b ;
}
$a = test(); // 这条语句会输出 $b 的值 为１
$a = 5 ;
$a = test(); // 这条语句会输出 $b 的值 为 2
$a =& test(); // 这条语句会输出 $b 的值 为 3
$a = 5 ;
$a = test(); // 这条语句会输出 $b 的值 为 6
class  talker{
    private   $data   =   'Hi' ;
    public   function   &  get(){
        return   $this -> data;
    }
    public   function  out(){
        echo   $this -> data;
        br();
    }
}
$aa   =   new  talker();
$d   =   & $aa -> get();
$aa -> out();
$d   =   'How' ;
$aa -> out();
$d   =   'Are' ;
$aa -> out();
$d   =   'You' ;
$aa -> out();
echo "lxm";
br();
//测试写时复制（数组篇）
$a = array(21, 7);
$b = $a;
$b[0] = 7;
var_dump($a);
echo '<br/>';
var_dump($b);
br();
echo "=================================";
br();
$a = array(21, 7);
$c = & $a[0];
$b = $a;
$b[0]= "21";
$b[1]= "7";

var_dump($a);
echo '<br/>';
var_dump($b);
echo '<br/>';
var_dump($c);
echo '<br/>'; 
echo "----------------after unset \$c----------<br/>";
unset($c);
var_dump($a);
br();
var_dump($b);
br();
echo "----------------after unset \$c  and unset \$b ----------<br/>";
unset($b);
var_dump($a);

/*br();
unset($a);
var_dump($b);
br();
*/

$testA = [1,2,3];
$testB = $testA;
$testA[0] = 'a';
br();
foreach ($testA as $key => $value) {
	echo "testA[$key]=$value<br>";
}

foreach ($testB as $key => $value) {
	echo "testA[$key]=$value<br>";
}
var_dump(memory_get_usage());
$tipi = array_fill(0, 100000, 'php-internal'); 
var_dump(memory_get_usage()); 

$tipi_copy = $tipi; 
var_dump(memory_get_usage()); 
