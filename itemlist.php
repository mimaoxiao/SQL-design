<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>物资捐赠清单</title>
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
            var str2 = "";
            var str3 = "";
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/gettable_item1",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息
                    $.each(dataObj, function(index, item) {
                        str1 += "<tr "+"onclick=\"melody(this);\""+"id=\""+item.ID+"\">";
                        str1 += "<td>" + item.ID + "</td>";
                        if (item.message.length >= 8) {
                            str1 += "<td>" + item.message.substring(0, 7) + "...</td>"
                        } else {
                            str1 += "<td>" + item.message + "</td>"
                        }
                        str1 += "<td>" + item.donorname + "</td>";
                        str1 += "<td>" + "库存内" + "</td>";
                        switch (item.status) {
                            case "1":
                                str1 += "<td>存入库存</td>";
                                break;
                            case "2":
                                str1 += "<td>保管</td>";
                                break;
                            case "3":
                                str1 += "<td>已捐赠</td>";
                                break;
                        }
                        str1 += "</tr>";
                    });
                }
            })
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/gettable_item2",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息
                    $.each(dataObj, function(index, item) {
                        str1 += "<tr "+"onclick=\"melody(this);\""+"id=\""+item.ID+"\">";
                        str2 += "<td>" + item.ID + "</td>";
                        if (item.message.length >= 8) {
                            str2 += "<td>" + item.message.substring(0, 7) + "...</td>"
                        } else {
                            str2 += "<td>" + item.message + "</td>"
                        }
                        str2 += "<td>" + item.donorname + "</td>";
                        str2 += "<td>" + item.ownername + "</td>";
                        switch (item.status) {
                            case "1":
                                str2 += "<td>存入库存</td>";
                                break;
                            case "2":
                                str2 += "<td>保管</td>";
                                break;
                            case "3":
                                str2 += "<td>已捐赠</td>";
                                break;
                        }
                        str2 += "</tr>";
                    });
                }
            })
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/gettable_item3",
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息
                    $.each(dataObj, function(index, item) {
                        str1 += "<tr "+"onclick=\"melody(this);\""+"id=\""+item.ID+"\">";
                        str3 += "<td>" + item.ID + "</td>";
                        if (item.message.length >= 8) {
                            str3 += "<td>" + item.message.substring(0, 7) + "...</td>"
                        } else {
                            str3 += "<td>" + item.message + "</td>"
                        }
                        str3 += "<td>" + item.donorname + "</td>";
                        str3 += "<td>" + item.ownername + "</td>";
                        switch (item.status) {
                            case "1":
                                str3 += "<td>存入库存</td>";
                                break;
                            case "2":
                                str3 += "<td>保管</td>";
                                break;
                            case "3":
                                str3 += "<td>已捐赠</td>";
                                break;
                        }
                        str3 += "</tr>";
                    });
                }
            })
            var str = str1 + str2 + str3;
            $("#table").html(str); //把内容入到这个div中即完成
        }
        function melody(aim){
            $.ajax({
                type: "POST",
                async: false,
                url: "./index.php?/pages/sqlGet/searchitem",
                data:{'id':aim.id},
                dataType: "json",
                success: function(result) {
                    var dataObj = result; //初始化表格信息
                    var str1="";
                    $.each(dataObj, function(index, item) {
                        str1+="<img src=\""+item.photo_url+"\">";
                        str1+="<div>详细信息:"+item.message+"</div>";
                    });
                    $("#modal").html(str1); //把内容入到这个div中即完成
                    $('#item-model').modal('show');
                }
            })
        }
    </script>
</head>

<body>
    <div class="donate-big-title">捐赠公益&nbsp;<small>点击表格可显示详细信息</small></div>
    <table class="text-center table">
        <thead>
            <tr>
                <th>ID</th>
                <th>内容</th>
                <th>捐赠者</th>
                <th>持有者</th>
                <th>状态</th>
            </tr>
        </thead>
        <tbody id="table">
        </tbody>
    </table>

    <div class="modal fade" id="item-model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="info" id="modal">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</body>

</html>