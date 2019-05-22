<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>

    <link rel="stylesheet" href="application/views/sqllesson/login.css">
</head>

<body>
    <div style="height: 100%;" class="row">
        <div class="col-md-4"></div>
        <div style="height:100%" class=" mainp col-md-4">
            <div class="main text-center">
                <div class="main-thing">
                    ezgo社区公益捐赠计划
                    <div style="margin-top: 30px;" class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <?php
                                    ini_set('date.timezone','Asia/Shanghai');
                                    $this->load->database();
                                    if(isset($_POST['name']))
                                    {
                                        $name_raw = $_POST['name'];
                                        $pass_raw = $_POST['password'];
                                        $name=$name_raw;
                                        $pass=md5($pass_raw);
                                        
                                        $sql="SELECT * FROM user
                                        WHERE (username=? and password=?)";
                                        $query = $this->db->query($sql,array($name,$pass));
                                        
                                        $row = $query->row();
                                        
                                        if($row)
                                        {
                                            session_start();
                                            $_SESSION['login']=$name_raw;
                                            $_SESSION['jobs']=$row->jobs;
                                            header("Location: http://144.202.14.13/index.php?/pages/sqllesson/back"); 
                                        }
                                        else
                                        {
                                            echo '<div style="padding-left:10px;padding-right:10px;" class="col-md-12">用户名或密码错误</div>';
                                        }  
                                    }               
                                ?>
                                <form action="./index.php?/pages/sqllesson/login" method="POST">
                                    <div style="margin-bottom: 15px; margin-left:0px;margin-right:0px;" class="row">
                                        <div style="padding-left:10px;padding-right:10px;" class="col-md-12">
                                            <input type="text" name="name" class="form-control" placeholder="账户或邮箱">
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 15px; margin-left:0px;margin-right:0px;" class="row">
                                        <div style="padding-left:10px;padding-right:10px;" class="col-md-12">
                                            <input type="password" name="password" class="form-control" placeholder="密码">
                                        </div>
                                    </div>
                                    <div style="margin-top: 25px;margin-bottom: 30px;" class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <input value="登录" type="submit" class="sub-btn btn btn-default">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>