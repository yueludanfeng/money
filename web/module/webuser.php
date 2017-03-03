<?php
class webuser //用户处理类
{
    //public $userName="游客";
    /*public $userName;//用户名属性
    
    public $userPwd;//用户密码
    public $userAge;//年龄
    
    public $userDisplayName;//用户显示名*/
    
    private $userinfo=array(); //用户属性 数组
    
    function webuser()
    {
         
      //  echo "用户类已经初始化";
    }
    function __set($key,$value)//设置用户类属性
    {
        if($key=="age")
        {
            //必须 大于21岁  
        }
        
       $this->userinfo[$key]=$value;
    }
    function __get($key) //获取用户类属性
    {
        //为啥不用 下面两种判断方法呢？
      //1、if(isset($this->userinfo[$key]))
      //2、if($this->userinfo[$key]) 
        
        if(array_key_exists($key,$this->userinfo))
        {
            return $this->userinfo[$key];
        }
        else
        {
            //return false;
            return "";
        }
    }
    function __call($methodName,$args) //默认执行函数
    {
        if($methodName=="add")
        {
            //代表是新增用户
            if($this->userName=="")
            {
                echo "用户名不能为空";
            }
            else
            {
                echo "用户新增成功";
            }
        //mysql 处理方法
        }
    }
    static public function getCurrentUser() //获取当前登录用户
    {
        echo "欢迎回来：沈逸";
    }
    
    
     /* function login($uname,$upwd) //用户登录方法
    {
        
    }*/
    
    
  /*   //传统方法 
    public static function addUser($userName,$userpwd)  // static public function add()  这样写也可以)
    {
        
    }
    function add()  //新增用户方法
    {
        //self::方法名
        if($this->userName=="")
        {
            echo "用户名不能为空";
        }
        else
        {
            echo "用户新增成功";  
        }
            
    }*/
}

?>