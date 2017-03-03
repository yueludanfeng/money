 <br />
  <br />
  <br />
  <div>新闻页面</div>
  <br />
  <?php
     if (isset($_GET["id"]))
     {
        $get_id=$_GET["id"];
     }
     else
     {
         $get_id = null;
     }

    //if(isset($_GET["id"]))
    //if($_GET["id"])//判断 当前是否参数
    if ($get_id)
        echo "获取到id参数是:".$get_id;
    else
        echo "没有参数";
  ?>
  <br />
  <br />
  <br />