<html>
<?php 
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
    header("refresh:3;http://144.202.14.13/index.php?/pages/sqllesson/back");
    die();
}
?>
    <head>
        <meta charset="utf-8">
        <title>日志列表</title>
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css" rel="stylesheet">
        <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
        <link rel="stylesheet" href="application/views/sqllesson/main.css">
        <link rel="stylesheet" href="application/views/sqllesson/list.css">
        <link rel="stylesheet" href="application/views/sqllesson/donate.css">
        <script>
            window.onload = function() {
                var str1 = "";

                $.ajax({
                        type: "POST",
                        url: "./index.php?/pages/sqlGet/getlog",
                        dataType: "json",
                        success: function(result) {
                            var dataObj = result; //初始化表格信息

                            $.each(dataObj, function(index, item) {
                                    str1 += "<tr>";
                                    str1 += "<td>" + item.timing + "</td>";
                                    str1 += "<td>";
                                    str1 += item.tablename;
                                    str1 += "-";
                                    str1 += item.action;
                                    str1 += "-";
                                    str1 += item.itemaim;

                                    if (item.action == "update") {
                                        str1 += "-";
                                        str1 += item.actionaim;
                                        str1 += "-old-";
                                        str1 += item.bef;
                                        str1 += "-new-";
                                        str1 += item.aft;
                                    }

                                    str1 += "</td>";
                                    str1 += "</tr>";
                                });
                                $("#table").html(str1); //把内容入到这个div中即完成
                        }
                    }

                ) 
            }
        </script>
    </head>

    <body>
        <div class="donate-big-title">捐赠公益</div>
        <table class="text-center table">
            <thead>
                <tr>
                    <th>时间</th>
                    <th>日志</th>
                </tr>
            </thead>
            <tbody id="table"></tbody>
        </table>
    </body>

</html>