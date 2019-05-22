<?php error_reporting(0);  session_start();
if(!isset($_SESSION['login']))
{
    echo "需要登录";
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/login");
    die();
}
else if($_SESSION['jobs']!=1)
{
    echo "权限不足";
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back");
    die();
}

ini_set('date.timezone','Asia/Shanghai');
$this->load->database();

$item=$_POST['item'];
if($item=="")
{
    echo "未指定物资";
    goto end;
}
$item_ID=intval(substr($item,0,strpos($item, ':')));
$sql = "update item set avaliable=0 where ID=?";
$query = $this->db->query($sql,$item_ID);

echo "操作完成";

end:
header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back"); 
?>