<?php error_reporting(0);  session_start();
if(!isset($_SESSION['login']))
{
    echo "需要登录";
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/login");
    die();
}
ini_set('date.timezone','Asia/Shanghai');
$this->load->database();

$user=$_POST['user'];
if($user=="")
{
    echo "未指定用户";
    goto end;
}
$user_ID=intval(substr($user,0,strpos($user, ':')));

$name=$_POST['name'];
if($name=="")
{
    echo "名字为空";
    goto end;
}
if(strlen($name)>15)
{
    echo "名字过长";
    goto end;
}

$email=$_POST['email'];
if(strlen($email)>30)
{
    echo "邮箱过长";
    goto end;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo "邮箱格式错误";
    goto end;
}

$phone=$_POST['phone'];
if($phone=="")
{
    echo "电话为空";
    goto end;
}
if(!is_numeric($phone))
{
    echo "电话不为数字";
    goto end;
}
if(strlen($phone)>20)
{
    echo "电话过长";
    goto end;
}

$remark=$_POST['remark'];
if(strlen($remark)>50)
{
    echo "备注过长";
    goto end;
}

$checksql="select * from keeper where user_ID=?";
$q=$this->db->query($checksql,$user_ID);
$r=$q->row();
if($r)
{
    echo "操作失败 该用户已创建角色";
    goto end;
}

$sql="insert into keeper (user_ID,name,email,phone,remark,avaliable)
values (?,?,?,?,?,1)";
if($this->db->query($sql, array($user_ID,$name,$email,$phone,$remark)))
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