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

$fileInfo = $_FILES["upFile"];
$fileName = $fileInfo["name"];
if($fileName=="")
{
    echo "未上传文件";
    goto end;
}
if(strlen($fileName)>200)
{
    echo "文件名过长";
    goto end;
}

$filePath = $fileInfo["tmp_name"];
$fileex=$fileInfo['extension'];
move_uploaded_file($filePath, "application/views/sqllesson/item/".$fileName.$fileex);
$photourl="application/views/sqllesson/item/".$fileName.$fileex;

$message=$_POST['message'];
if($message=="")
{
    echo "描述为空";
    goto end;
}
if(strlen($message)>200)
{
    echo "描述过长";
    goto end;
}

$item=$_POST['item'];
if($item=="")
{
    echo "未指定物资";
    goto end;
}
$item_ID=intval(substr($item,0,strpos($item, ':')));

$sql="select photo_url from item where ID=?";
$query = $this->db->query($sql,$item_ID);
$row = $query->row();
unlink($row->photo_url);

$sql="update table item set message=?,photo_url=? where ID=? and avaliable = 1";
if($this->db->query($sql, array($message,$photourl,$item_ID)))
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