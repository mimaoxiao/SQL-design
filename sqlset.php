<?php
$con=mysqli_connect("localhost","root","nekopara","ezgo"); 
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 
 
// 执行查询
$sql = "CREATE TABLE user 
(
ID int not null AUTO_INCREMENT,
username varchar(36) not null,
password varchar(36) not null,
jobs int not null,
avaliable int not null,
primary key(ID)
)";
if(!mysqli_query($con,$sql))
{
    echo "create user boom";
}
else
{
    echo "user success";
    $sql = "insert into user
    (username,password,jobs,avaliable) 
    values
    ('mimaoxiao','5209b685529d6e0731d9f9728c085d4e',1,1)";
    mysqli_query($con,$sql);/*测试帐号mimaoxiao 密码mimao 最高权限*/

    $sql = "insert into user
    (username,password,jobs,avaliable) 
    values
    ('Lighting','61d970998e9e02f78156c11e9f12211c',2,1)";
    mysqli_query($con,$sql);/*测试帐号Lighting 密码fbkmio 二等权限*/
}



$sql = "CREATE TABLE donor
(
ID int not null AUTO_INCREMENT,
type int not null,
name varchar(15) not null,
email varchar(30),
phone varchar(20) not null,
remark varchar(50),
avaliable int not null,
primary key(ID)
)";
if(!mysqli_query($con,$sql))
{
    echo "create donor boom";
}
else
{
    echo "donor success";
}

$sql = "CREATE TABLE donee
(
ID int not null AUTO_INCREMENT,
type int not null,
name varchar(15) not null,
email varchar(30),
phone varchar(20) not null,
remark varchar(50),
avaliable int not null,
primary key(ID)
)";
if(!mysqli_query($con,$sql))
{
    echo "create donee boom";
}
else
{
    echo "donee success";
}
$sql = "CREATE TABLE computer
(
ID int not null AUTO_INCREMENT,
type varchar(20) not null,
status int not null,
donor_ID int not null,
owner_ID int,
photo_url varchar(250),
remark varchar(50),
avaliable int not null,
primary key(ID),
foreign key(donor_ID) references donor(ID)
)";
if(!mysqli_query($con,$sql))
{
    echo "create computer boom";
}
else
{
    echo "computer success";
}

$sql = "CREATE TABLE item
(
ID int not null AUTO_INCREMENT,
message varchar(200) not null,
status int not null,
donor_ID int not null,
owner_ID int  ,
photo_url varchar(250),
avaliable int not null,
primary key(ID),
foreign key(donor_ID) references donor(ID)
)";
if(!mysqli_query($con,$sql))
{
    echo "create item boom";
}
else
{
    echo "computer success";
}


$sql = "CREATE TABLE keeper
(
ID int not null AUTO_INCREMENT,
user_ID int not null,
name varchar(15) not null,
email varchar(30),
phone varchar(20) not null,
remark varchar(50),
avaliable int not null,
primary key(ID),
foreign key(user_ID) references user(ID) ON DELETE CASCADE ON UPDATE CASCADE
)";
if(!mysqli_query($con,$sql))
{
    echo "create keeper boom";
}
else
{
    echo "keeper success";
}

mysqli_close($con);

?>