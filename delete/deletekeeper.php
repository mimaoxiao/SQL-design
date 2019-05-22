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

$keeper=$_POST['keeper'];
if($keeper=="")
{
    echo "未指定保管者";
    goto end;
}
$keeper_ID=intval(substr($keeper,0,strpos($keeper, ':')));

$sql = "select * from computer where owner_ID=? and avaliable=1";
$query = $this->db->query($sql,$keeper_ID);
$row = $query->row();
if($row)
{
    echo "有电脑与之关联 操作失败";
    goto end;
}
$sql = "select * from item where owner_ID=? and avaliable=1";
$query = $this->db->query($sql,$keeper_ID);
$row = $query->row();
if($row)
{
    echo "有物资与之关联 操作失败";
    goto end;
}

$sql = "update keeper set avaliable=0 where ID=?";
$query = $this->db->query($sql,$keeper_ID);

echo "操作完成";

end:
header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back"); 
?>