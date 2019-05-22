<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>捐赠者列表</title>
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
                async: false,
                url: "./index.php?/pages/sqlGet/getdonor",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息
                    $.each(dataObj, function(index, item) {
                        str1 += "<tr>";
                        str1 += "<td>" + item.ID + "</td>";
                        str1 += "<td>" + item.name + "</td>";
                        str1 += "<td>" + item.email + "</td>";
                        str1 += "</tr>";
                    });
                }
            })
            $("#table").html(str1); //把内容入到这个div中即完成
        }
    </script>
</head>

<body>
    <div class="donate-big-title">捐赠公益</div>
    <table class="text-center table">
        <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>邮箱地址</th>
            </tr>
        </thead>
        <tbody id="table">
        </tbody>
    </table>
</body>

</html>