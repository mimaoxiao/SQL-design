<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>执行中...</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="application/views/sqllesson/main.css">
</head>
<style>
    div.main {
        font-weight: bolder;
        font-size: 20px;
        color: #7B68EE;
    }
</style>

<body class="text-center">
    <div class="col-md-4"></div>
    <div class="col-md-4 main">
<?php error_reporting(0); 
ini_set('date.timezone','Asia/Shanghai');
$this->load->database();
session_start();
if(!isset($_SESSION['login']))
{
    echo "需要登录";
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/login");
    die();
}
else if($_SESSION['jobs']!=1)
{
    echo "权限不足";
    goto end;
}

if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/item.txt'))
{
    unlink('/usr/local/nginx/html/application/views/sqllesson/back/item.txt');
}
if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/computer.txt'))
{
    unlink('/usr/local/nginx/html/application/views/sqllesson/back/computer.txt');
}
if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/donor.txt'))
{
    unlink('/usr/local/nginx/html/application/views/sqllesson/back/donor.txt');
}
if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/donee.txt'))
{
    unlink('/usr/local/nginx/html/application/views/sqllesson/back/donee.txt');
}
if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/keeper.txt'))
{
    unlink('/usr/local/nginx/html/application/views/sqllesson/back/keeper.txt');
}
if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/user.txt'))
{
    unlink('/usr/local/nginx/html/application/views/sqllesson/back/user.txt');
}
if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/logsp.txt'))
{
    unlink('/usr/local/nginx/html/application/views/sqllesson/back/logsp.txt');
}

$sql="select * from item into outfile '/usr/local/nginx/html/application/views/sqllesson/back/item.txt';";
$this->db->query($sql);

$sql="select * from computer into outfile '/usr/local/nginx/html/application/views/sqllesson/back/computer.txt';";
$this->db->query($sql);

$sql="select * from donor into outfile '/usr/local/nginx/html/application/views/sqllesson/back/donor.txt';";
$this->db->query($sql);

$sql="select * from donee into outfile '/usr/local/nginx/html/application/views/sqllesson/back/donee.txt';";
$this->db->query($sql);

$sql="select * from keeper into outfile '/usr/local/nginx/html/application/views/sqllesson/back/keeper.txt';";
$this->db->query($sql);

$sql="select * from user into outfile '/usr/local/nginx/html/application/views/sqllesson/back/user.txt';";
$this->db->query($sql);

$sql="select * from logsp into outfile '/usr/local/nginx/html/application/views/sqllesson/back/logsp.txt';";
$this->db->query($sql);

echo "备份完成";
end:
header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back"); 

?>