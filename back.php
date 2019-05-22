<!DOCTYPE html>
<html>
<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/login");;
    }
?>

<head>
    <meta charset="utf-8">
    <title>ezgo&nbsp;China社区公益捐赠计划后台</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="application/views/sqllesson/main.css">
    <link rel="stylesheet" href="application/views/sqllesson/simple.css">
    <script src="application/views/sqllesson/loading.js"></script>
    <script>
        window.onload = function() {
            load_donor();
            load_nowuser();
            load_computer();
            load_donee();
            load_keeper();
            load_item();
        }

        function filesizecheck(target) {
            var filesize = target.files[0].size;

            var size = filesize / 1024;
            if (size >= 5000) {
                alert("附件不能大于5M");
                target.value = "";
                return
            }
        }

        function openlog() {
            window.open("http://144.202.14.13/index.php?/pages/sqllesson/log");
        }
    </script>
</head>

<body style="background-color:#f5f5f5">
    <div class="panel panel-default">
        <div style="background-color:#f5f5f5" class="text-center">
            <?php
                echo "用户身份:".$_SESSION['login']." 等级:".$_SESSION['jobs'];
            ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">增添</div>
        <div style="background-color:#f5f5f5" class="text-center">
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#donor-model">增加捐赠者</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#donee-model">增加受赠者</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#keeper-model">增加保管者</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#computer-model">增加电脑</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#item-model">增加物资</button>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">移交</div>
        <div style="background-color:#f5f5f5" class="text-center">
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#change-computer-model">暂存电脑</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#save-computer-model">移回电脑</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#give-computer-model">赠送电脑</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#change-item-model">暂存物资</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#save-item-model">移回物资</button>
            <button style="margin:20px" class="btn btn-primary" type="button" data-toggle="modal" data-target="#give-item-model">赠送物资</button>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">日志</div>
        <div style="background-color:#f5f5f5" class="text-center">
            <button onclick="openlog();" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">日志查询</button>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">备份 <?php
        if(file_exists('/usr/local/nginx/html/application/views/sqllesson/back/item.txt'))
        {
            clearstatcache();
            echo "持有备份时间:".date("F d Y H:i:s.",fileatime("/usr/local/nginx/html/application/views/sqllesson/back/item.txt"));
        }
        ?></div>
        <div style="background-color:#f5f5f5" class="text-center">
            <button onclick="window.location.href='http://144.202.14.13/index.php?/pages/sqlChange/backupsave';" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">更新备份</button>
            <button onclick="window.location.href='http://144.202.14.13/index.php?/pages/sqlChange/backupuse';" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">使用备份</button>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">更新</div>
        <div style="background-color:#f5f5f5" class="text-center">
            <button data-toggle="modal" data-target="#update-donor-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">更新捐赠者</button>
            <button data-toggle="modal" data-target="#update-donee-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">更新受赠者</button>
            <button data-toggle="modal" data-target="#update-keeper-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">更新保管者</button>
            <button data-toggle="modal" data-target="#update-computer-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">更新电脑</button>
            <button data-toggle="modal" data-target="#update-item-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">更新物资</button>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">删除</div>
        <div style="background-color:#f5f5f5" class="text-center">
            <button data-toggle="modal" data-target="#delete-donor-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">删除捐赠者</button>
            <button data-toggle="modal" data-target="#delete-donee-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">删除受赠者</button>
            <button data-toggle="modal" data-target="#delete-keeper-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">删除保管者</button>
            <button data-toggle="modal" data-target="#delete-computer-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">删除电脑</button>
            <button data-toggle="modal" data-target="#delete-item-model" <?php
            if($_SESSION['jobs']!=1)
            {
                echo 'disabled=\"disabled\"';
            }
            ?> style="margin:20px" class="btn btn-primary" type="button">删除物资</button>
        </div>
    </div>

    <!-- 模态框们-->
    <!-- 电脑-->
    <div class="modal fade" id="computer-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlUpload/uploadcomputer" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">新建电脑</div>
                    </div>
                    <div class="form-group">
                        <label>型号</label>
                        <input name="type" class="form-control" placeholder="Acer-P7">
                    </div>
                    <div class="form-group">
                        <label>捐赠人</label>
                        <div id="donor-all1"></div>
                    </div>
                    <div class="form-group">
                        <label>添加样品图</label>
                        <input type="file" name="upFile" accept="image/jpeg, image/png, image/jpg,image/bmp" onchange="filesizecheck(this);">
                        <p class="help-block">上传文件小于5M</p>
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>



    <!-- 物资捐赠-->
    <div class="modal fade" id="item-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlUpload/uploaditem" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">新建物资</div>
                    </div>
                    <div class="form-group">
                        <label>描述</label>
                        <textarea name="message" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>捐赠人</label>
                        <div id="donor-all2"></div>
                    </div>
                    <div class="form-group">
                        <label>添加样品图</label>
                        <input type="file" name="upFile" accept="image/jpeg, image/png, image/jpg,image/bmp" onchange="filesizecheck(this);">
                        <p class="help-block">上传文件小于5M</p>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 添加捐赠人-->
    <div class="modal fade" id="donor-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlUpload/uploaddonor" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">新建捐赠人</div>
                    </div>
                    <div class="form-group">
                        <label>类型</label>
                        <select class="form-control" name="type">
                            <option>个人</option>
                            <option>团体</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>电话</label>
                        <input name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 添加受赠人-->
    <div class="modal fade" id="donee-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlUpload/uploaddonee" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">新建受赠人</div>
                    </div>
                    <div class="form-group">
                        <label>类型</label>
                        <select class="form-control" name="type">
                            <option>个人</option>
                            <option>团体</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>电话</label>
                        <input name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 添加保管人-->
    <div class="modal fade" id="keeper-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlUpload/uploadkeeper" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">新建保管者</div>
                    </div>
                    <div class="form-group">
                        <label>已有用户</label>
                        <div id="user">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>电话</label>
                        <input name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!--电脑移回-->
    <div class="modal fade" id="save-computer-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/savecomputer" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">移回电脑</div>
                    </div>
                    <div class="form-group">
                        <label>目标电脑</label>
                        <div id="computer-save">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">确认移回库存</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!--物资移回-->
    <div class="modal fade" id="save-item-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/saveitem" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">移回物资</div>
                    </div>
                    <div class="form-group">
                        <label>目标物资</label>
                        <div id="item-save">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">确认移回库存</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!--电脑暂存-->
    <div class="modal fade" id="change-computer-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/changecomputer" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">暂存电脑</div>
                    </div>
                    <div class="form-group">
                        <label>目标电脑</label>
                        <div id="computer-give">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>保管者</label>
                        <div id="keeper-give1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">确认暂存</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!--物资暂存-->
    <div class="modal fade" id="change-item-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/changeitem" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">暂存物资</div>
                    </div>
                    <div class="form-group">
                        <label>目标物资</label>
                        <div id="item-give">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>保管者</label>
                        <div id="keeper-give2">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">确认暂存</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!--电脑赠送-->
    <div class="modal fade" id="give-computer-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/givecomputer" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">电脑赠送</div>
                    </div>
                    <div class="form-group">
                        <label>目标电脑</label>
                        <div id="computer-send">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>受赠者</label>
                        <div id="donee-send1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">确认赠送</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!--物资赠送-->
    <div class="modal fade" id="give-item-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/giveitem" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">物资赠送</div>
                    </div>
                    <div class="form-group">
                        <label>目标物资</label>
                        <div id="item-send">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>受赠者</label>
                        <div id="donee-send2">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">确认赠送</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 电脑更新-->
    <div class="modal fade" id="update-computer-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/updatecomputer" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">电脑信息更新</div>
                    </div>
                    <div class="form-group">
                        <label>目标电脑</label>
                        <div id="computer-update">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>型号</label>
                        <input name="type" class="form-control" placeholder="Acer-P7">
                    </div>
                    <div class="form-group">
                        <label>添加样品图</label>
                        <input type="file" name="upFile" accept="image/jpeg, image/png, image/jpg,image/bmp" onchange="filesizecheck(this);">
                        <p class="help-block">上传文件小于5M</p>
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 物资更新-->
    <div class="modal fade" id="update-item-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/updateitem" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">物资更新</div>
                    </div>
                    <div class="form-group">
                        <label>目标物资</label>
                        <div id="item-update">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>描述</label>
                        <textarea name="message" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>添加样品图</label>
                        <input type="file" name="upFile" accept="image/jpeg, image/png, image/jpg,image/bmp" onchange="filesizecheck(this);">
                        <p class="help-block">上传文件小于5M</p>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 更新捐赠人-->
    <div class="modal fade" id="update-donor-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/updatedonor" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">捐赠人更新</div>
                    </div>
                    <div class="form-group">
                        <label>目标捐赠人</label>
                        <div id="donor-update">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>类型</label>
                        <select class="form-control" name="type">
                            <option>个人</option>
                            <option>团体</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>电话</label>
                        <input name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 更新受赠人-->
    <div class="modal fade" id="update-donee-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/updatedonee" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">受赠人更新</div>
                    </div>
                    <div class="form-group">
                        <label>目标受赠人</label>
                        <div id="donee-update">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>类型</label>
                        <select class="form-control" name="type">
                            <option>个人</option>
                            <option>团体</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>电话</label>
                        <input name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 更新保管人-->
    <div class="modal fade" id="update-keeper-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlChange/updatekeeper" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">保管者更新</div>
                    </div>
                    <div class="form-group">
                        <label>目标保管者</label>
                        <div id="keeper-update">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>电话</label>
                        <input name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>备注</label>
                        <textarea name="remark" class="form-control" placeholder="备注" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 删除电脑-->
    <div class="modal fade" id="delete-computer-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlDelete/deletecomputer" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">删除电脑</div>
                    </div>
                    <div class="form-group">
                        <label>目标电脑</label>
                        <div id="computer-delete">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 删除物资-->
    <div class="modal fade" id="delete-item-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlDelete/deleteitem" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">删除物资</div>
                    </div>
                    <div class="form-group">
                        <label>目标物资</label>
                        <div id="item-delete">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 删除捐赠者-->
    <div class="modal fade" id="delete-donor-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlDelete/deletedonor" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">删除捐赠者</div>
                    </div>
                    <div class="form-group">
                        <label>目标捐赠者</label>
                        <div id="donor-delete">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 删除受赠者-->
    <div class="modal fade" id="delete-donee-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlDelete/deletedonee" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">删除受赠者</div>
                    </div>
                    <div class="form-group">
                        <label>目标受赠者</label>
                        <div id="donee-delete">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 删除保管者-->
    <div class="modal fade" id="delete-keeper-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="modal-form" action="./index.php?/pages/sqlDelete/deletekeeper" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">删除保管者</div>
                    </div>
                    <div class="form-group">
                        <label>目标保管者</label>
                        <div id="keeper-delete">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</body>

</html>