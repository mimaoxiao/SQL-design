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
move_uploaded_file($filePath, "application/views/sqllesson/computer/".$fileName.$fileex);

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

$computer=$_POST['computer'];
if($computer=="")
{
    echo "未指定电脑";
    goto end;
}

$photourl="application/views/sqllesson/computer/".$fileName.$fileex;

$remark=$_POST['remark'];
if(strlen($remark)>50)
{
    echo "备注过长";
    goto end;
}

$computer_ID=intval(substr($computer,0,strpos($computer, ':')));

$sql="select photo_url from computer where ID=? and avaliable = 1";
$query = $this->db->query($sql,$computer_ID);
$row = $query->row();
unlink($row->photo_url);

$sql="update table computer set type=?,photo_url=?,remark=? where ID=?";
if($this->db->query($sql, array($type,$photourl,$remark,$computer_ID)))
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