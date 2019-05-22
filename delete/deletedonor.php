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

$donor=$_POST['donor'];
if($donor=="")
{
    echo "未指定捐赠者";
    goto end;
}
$donor_ID=intval(substr($donor,0,strpos($donor, ':')));

$sql = "select * from computer where owner_ID=? and avaliable=1";
$query = $this->db->query($sql,$donor_ID);
$row = $query->row();
if($row)
{
    echo "有电脑与之关联 操作失败";
    goto end;
}
$sql = "select * from item where owner_ID=? and avaliable=1";
$query = $this->db->query($sql,$donor_ID);
$row = $query->row();
if($row)
{
    echo "有物资与之关联 操作失败";
    goto end;
}
$sql = "update donor set avaliable=0 where ID=?";
$query = $this->db->query($sql,$donor_ID);

end:
header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back"); 
?>