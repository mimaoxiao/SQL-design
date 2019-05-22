<?php error_reporting(0);  session_start();
if(!isset($_SESSION['login']))
{
    echo "需要登录";
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/login");
    die();
}
ini_set('date.timezone','Asia/Shanghai');
$fileInfo = $_FILES["upFile"];
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

@$fileex=$fileInfo['extension'];
//移动文件
move_uploaded_file($filePath, "application/views/sqllesson/computer/".$fileName.$fileex);


$this->load->database();

$type=$_POST['type'];
if($type=="")
{
    echo "型号为空";
    goto end;
}
if(strlen($type)>20)
{
    echo "型号过长";
    goto end;
}

$donor=$_POST['donor'];
if($donor=="")
{
    echo "捐赠人为空";
    goto end;
}

$photourl="application/views/sqllesson/computer/".$fileName.$fileex;
$remark=$_POST['remark'];
if(strlen($remark)>50)
{
    echo "备注过长";
    goto end;
}

$donor_ID=intval(substr($donor,0,strpos($donor, ':')));

$sql="insert into computer (type,status,donor_ID,owner_ID,photo_url,remark,avaliable)
values (?,1,?,0,?,?,1)";
if($this->db->query($sql, array($type,$donor_ID,$photourl,$remark)))
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