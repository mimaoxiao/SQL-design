<?php error_reporting(0);  session_start();
if(!isset($_SESSION['login']))
{
    echo "需要登录";
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/login");
    die();
}
ini_set('date.timezone','Asia/Shanghai');
$this->load->database();

if($_POST['computer']=="")
{
    echo "未指定电脑";
    goto end;

$computerID=intval(substr($_POST['computer'],0,strpos($_POST['computer'], ':')));
$sql="update computer set owner_ID = 0,status=1 where ID = ? and avaliable = 1";

if($this->db->query($sql, $computerID))
{
    echo "更新完成";
    goto end;
}
else
{
    echo "操作失败";
    goto end;
}
end:
header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back"); 
?>