<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ezgo&nbsp;China社区公益捐赠计划</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="application/views/sqllesson/main.css">
    <script>
        window.onload = function() {
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/getmain1",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息

                    $.each(dataObj, function(index, item) {
                        $("#computer").html(item.num);
                    });
                }
            })
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/getmain2",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息

                    $.each(dataObj, function(index, item) {
                        $("#item").html(item.num);
                    });
                }
            })
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/getmain3",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息

                    $.each(dataObj, function(index, item) {
                        $("#donor").html(item.num);
                    });
                }
            })
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/getmain4",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息

                    $.each(dataObj, function(index, item) {
                        $("#donee").html(item.num);
                    });
                }
            })
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/getmain5",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息

                    $.each(dataObj, function(index, item) {
                        $("#keeper").html(item.num);
                    });
                }
            })
        }
    </script>
</head>

<body>
    <div class="big-about">
        <div class="row">
            <div class="col-md-8">
                <div class="about-title"><span class="bigtitle">ABOUT</span><span class="smalltitle">关于公益捐赠计划</span></div>
                <div class="about-text">
                    <p>如果您有不需要用的旧电脑，不再需要的旧书等有益物资，欢迎您考虑捐助给我们。我们将会把旧电脑清理、安装 ezgo 开源操作系统，对旧书等物资做整理和清洁，捐助给全国各地的公益学校。</p>
                    <p>捐助物资的您，我们可能没办法在物质上补偿您，但是我们会赠送您一份由ezgo社区设计的纪念卡片一份。并且您将成为我们“ezgo 公益之友”，获得我们尽最大努力能为您能提供的一些资讯和服务。</p>
                    <p>愿每个人都成为世间一道美丽风景，愿每一颗星星都在黑夜中熠熠生辉。</p>
                    <button class="btn btn-primary col-md-2" style="width:20%;border:none;margin:20px;" type="button"><a class="donate-a" style="color:white;" href="./index.php?/pages/sqllesson/login">登录</a></button>
                </div>
            </div>
            <div class="col-md-4">
                <img style="width:400px" src="application/views/sqllesson/ezgoicon.jpg">
            </div>
            <div class="col-md-12">
                <div class="about-part col-md-2" style="width:18%">
                    <div class="part-num text-center" id="computer"></div>
                    <a class="donate-a" target="view_window" href="./index.php?/pages/sqllesson/computerlist">
                        <div class="part-word text-center">捐赠电脑</div>
                    </a>
                </div>
                <div class="about-part col-md-2" style="width:18%">
                    <div class="part-num text-center" id="item"></div>
                    <a class="donate-a" target="view_window" href="./index.php?/pages/sqllesson/itemlist">
                        <div class="part-word text-center">捐赠物资</div>
                    </a>
                </div>
                <div class="about-part col-md-2" style="width:18%">
                    <div class="part-num text-center" id="donor"></div>
                    <a class="donate-a" target="view_window" href="./index.php?/pages/sqllesson/donorlist">
                        <div class="part-word text-center">捐赠人</div>
                    </a>
                </div>
                <div class="about-part col-md-2" style="width:18%">
                    <div class="part-num text-center" id="donee"></div>
                    <a class="donate-a" target="view_window" href="./index.php?/pages/sqllesson/doneelist">
                        <div class="part-word text-center">受赠人</div>
                    </a>
                </div>
                <div class="about-part col-md-2" style="width:18%">
                    <div class="part-num text-center" id="keeper"></div>
                    <a class="donate-a" target="view_window" href="./index.php?/pages/sqllesson/keeperlist">
                        <div class="part-word text-center">志愿者</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>