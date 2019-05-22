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

if(!file_exists('/usr/local/nginx/html/application/views/sqllesson/back/item.txt'))
{
    echo "文件缺失 需重新备份";goto end;
}
if(!file_exists('/usr/local/nginx/html/application/views/sqllesson/back/computer.txt'))
{
    echo "文件缺失 需重新备份";goto end;
}
if(!file_exists('/usr/local/nginx/html/application/views/sqllesson/back/donor.txt'))
{
    echo "文件缺失 需重新备份";goto end;
}
if(!file_exists('/usr/local/nginx/html/application/views/sqllesson/back/donee.txt'))
{
    echo "文件缺失 需重新备份";goto end;
}
if(!file_exists('/usr/local/nginx/html/application/views/sqllesson/back/keeper.txt'))
{
    echo "文件缺失 需重新备份";goto end;
}
if(!file_exists('/usr/local/nginx/html/application/views/sqllesson/back/user.txt'))
{
    echo "文件缺失 需重新备份";goto end;
}
if(!file_exists('/usr/local/nginx/html/application/views/sqllesson/back/logsp.txt'))
{
    echo "文件缺失 需重新备份";goto end;
}

$sql="SET FOREIGN_KEY_CHECKS = 0;";
$this->db->query($sql);

$sql="delete from item";
$this->db->query($sql);

$sql="load data infile '/usr/local/nginx/html/application/views/sqllesson/back/item.txt' into table item;";
$this->db->query($sql);

$sql="delete from computer";
$this->db->query($sql);

$sql="load data infile '/usr/local/nginx/html/application/views/sqllesson/back/computer.txt' into table computer;";
$this->db->query($sql);

$sql="delete from donor";
$this->db->query($sql);

$sql="load data infile '/usr/local/nginx/html/application/views/sqllesson/back/donor.txt' into table donor;";
$this->db->query($sql);

$sql="delete from donee";
$this->db->query($sql);

$sql="load data infile '/usr/local/nginx/html/application/views/sqllesson/back/donee.txt' into table donee;";
$this->db->query($sql);

$sql="delete from keeper";
$this->db->query($sql);

$sql="load data infile '/usr/local/nginx/html/application/views/sqllesson/back/keeper.txt' into table keeper;";
$this->db->query($sql);

$sql="delete from user";
$this->db->query($sql);

$sql="load data infile '/usr/local/nginx/html/application/views/sqllesson/back/user.txt' into table user;";
$this->db->query($sql);

$sql="delete from logsp";
$this->db->query($sql);

$sql="load data infile '/usr/local/nginx/html/application/views/sqllesson/back/logsp.txt' into table logsp;";
$this->db->query($sql);

$sql="SET FOREIGN_KEY_CHECKS = 1;";
$this->db->query($sql);

echo "备份恢复完成";

end:
header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back"); 

?>