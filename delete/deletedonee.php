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

$donee=$_POST['donee'];
if($donee=="")
{
    echo "未指定受赠者";
    goto end;
}
$donee_ID=intval(substr($donee,0,strpos($donee, ':')));

$sql = "select * from computer where owner_ID=? and avaliable=1";
$query = $this->db->query($sql,$donee_ID);
$row = $query->row();
if($row)
{
    echo "有电脑与之关联 操作失败";
    goto end;
}
$sql = "select * from item where owner_ID=? and avaliable=1";
$query = $this->db->query($sql,$donee_ID);
$row = $query->row();
if($row)
{
    echo "有物资与之关联 操作失败";
    goto end;
}
$sql = "update donee set avaliable=0 where ID=?";
$query = $this->db->query($sql,$donee_ID);

end:
header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back"); 
?>