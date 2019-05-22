<?php error_reporting(0);  session_start();
if(!isset($_SESSION['login']))
{
    echo "需要登录";
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/login");
    die();
}
ini_set('date.timezone','Asia/Shanghai');

@$fileInfo = $_FILES["upFile"];
// 获取上传文件的名称

$fileName = $fileInfo["name"];
if($fileName=="")
{
    echo "未上传图片";
    goto end;
}
if(strlen($fileName)>200)
{
    echo "文件名过长";
    goto end;
}
// 获取上传文件保存的临时路径
$filePath = $fileInfo["tmp_name"];
$fileex=$fileInfo['extension'];
//移动文件
move_uploaded_file($filePath, "application/views/sqllesson/item/".$fileName.$fileex);


$this->load->database();

$donor=$_POST['donor'];
if($donor=="")
{
    echo "捐赠人为空";
    goto end;
}
$donor_ID=intval(substr($donor,0,strpos($donor, ':')));

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

$sql="insert into item (status,message,donor_ID,owner_ID,photo_url,avaliable)
values (1,?,?,0,?,1)";
if($this->db->query($sql, array($message,$donor_ID,$photourl)))
{
    echo "上传成功";
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