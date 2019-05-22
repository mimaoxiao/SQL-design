function load_donor() {
    $.ajax({
        type: "POST",
        url: "./index.php?/pages/sqlGet/getdonor",
        dataType: "json",
        success: function(result) {
            var dataObj = result; //返回的result为json格式的数据
            var user = "<select class=" + "form-control" + " " + "name=" + "donor" + ">";
            $.each(dataObj, function(index, item) {
                user += "<option>";
                user += item.ID;
                user += ":";
                user += item.name;
                user += "</option>";
            });
            $("#donor-all1").html(user); //把内容入到这个div中即完成
            $("#donor-all2").html(user); //把内容入到这个div中即完成
            $("#donor-update").html(user); //把内容入到这个div中即完成
            $("#donor-delete").html(user); //把内容入到这个div中即完成
        }
    })
}

function load_nowuser() {
    $.ajax({
        type: "POST",
        url: "./index.php?/pages/sqlGet/getuser",
        dataType: "json",
        success: function(result) {
            var dataObj = result; //返回的result为json格式的数据
            var user = "<select class=" + "form-control" + " " + "name=" + "user" + ">";
            $.each(dataObj, function(index, item) {
                user += "<option>";
                user += item.ID;
                user += ":";
                user += item.username;
                user += "</option>";
            });
            $("#user").html(user); //把内容入到这个div中即完成
        }
    })
}

function load_donee() {
    $.ajax({
        type: "POST",
        url: "./index.php?/pages/sqlGet/getdonee",
        dataType: "json",
        success: function(result) {
            var dataObj = result; //返回的result为json格式的数据
            var user = "<select class=" + "form-control" + " " + "name=" + "donee" + ">";
            $.each(dataObj, function(index, item) {
                user += "<option>";
                user += item.ID;
                user += ":";
                user += item.name;
                user += "</option>";
            });
            $("#donee-send1").html(user); //把内容入到这个div中即完成
            $("#donee-send2").html(user); //把内容入到这个div中即完成
            $("#donee-update").html(user); //把内容入到这个div中即完成
            $("#donee-delete").html(user); //把内容入到这个div中即完成
        }
    })
}

function load_keeper() {
    $.ajax({
        type: "POST",
        url: "./index.php?/pages/sqlGet/getkeeper",
        dataType: "json",
        success: function(result) {
            var dataObj = result; //返回的result为json格式的数据
            var user = "<select class=" + "form-control" + " " + "name=" + "keeper" + ">";
            $.each(dataObj, function(index, item) {
                user += "<option>";
                user += item.ID;
                user += ":";
                user += item.name;
                user += "</option>";
            });
            $("#keeper-give1").html(user); //把内容入到这个div中即完成
            $("#keeper-give2").html(user); //把内容入到这个div中即完成
            $("#keeper-update").html(user); //把内容入到这个div中即完成
            $("#keeper-delete").html(user); //把内容入到这个div中即完成
        }
    })
}

function load_item() {
    $.ajax({
        type: "POST",
        url: "./index.php?/pages/sqlGet/getitem",
        dataType: "json",
        success: function(result) {
            var dataObj = result; //返回的result为json格式的数据
            var user1 = "<select class=" + "form-control" + " " + "name=" + "item" + ">";
            var user2 = "<select class=" + "form-control" + " " + "name=" + "item" + ">";
            var user3 = "<select class=" + "form-control" + " " + "name=" + "item" + ">";
            var user4 = "<select class=" + "form-control" + " " + "name=" + "item" + ">";
            $.each(dataObj, function(index, item) {
                if (item.status != 3) {

                    user3 += "<option>";
                    user3 += item.ID;
                    user3 += ":";
                    if (item.message.length >= 8) {
                        user3 += "<td>" + item.message.substring(0, 7) + "...</td>"
                    } else {
                        user3 += "<td>" + item.message + "</td>"
                    }
                    user3 += "</option>";

                    switch (item.status) {
                        case "1": //库存状态 可暂存
                            user2 += "<option>";
                            user2 += item.ID;
                            user2 += ":";
                            if (item.message.length >= 8) {
                                user2 += "<td>" + item.message.substring(0, 7) + "...</td>"
                            } else {
                                user2 += "<td>" + item.message + "</td>"
                            }
                            user2 += "</option>";

                            break;

                        case "2": //暂存状态 可收回
                            user1 += "<option>";
                            user1 += item.ID;
                            user1 += ":";
                            if (item.message.length >= 8) {
                                user1 += "<td>" + item.message.substring(0, 7) + "...</td>"
                            } else {
                                user1 += "<td>" + item.message + "</td>"
                            }
                            user1 += "</option>";
                    }
                }
                user4 += "<option>";
                user4 += item.ID;
                user4 += ":";
                if (item.message.length >= 8) {
                    user4 += "<td>" + item.message.substring(0, 7) + "...</td>"
                } else {
                    user4 += "<td>" + item.message + "</td>"
                }
                user4 += "</option>";
            });
            $("#item-save").html(user1); //把内容入到这个div中即完成
            $("#item-give").html(user2); //把内容入到这个div中即完成
            $("#item-send").html(user3); //把内容入到这个div中即完成
            $("#item-update").html(user4); //把内容入到这个div中即完成
            $("#item-delete").html(user4); //把内容入到这个div中即完成
        }
    })
}

function load_computer() {
    $.ajax({
        type: "POST",
        url: "./index.php?/pages/sqlGet/getcomputer",
        dataType: "json",
        success: function(result) {
            var dataObj = result; //返回的result为json格式的数据
            var user1 = "<select class=" + "form-control" + " " + "name=" + "computer" + ">";
            var user2 = "<select class=" + "form-control" + " " + "name=" + "computer" + ">";
            var user3 = "<select class=" + "form-control" + " " + "name=" + "computer" + ">";
            var user4 = "<select class=" + "form-control" + " " + "name=" + "computer" + ">";
            $.each(dataObj, function(index, item) {
                if (item.status != 3) {

                    user3 += "<option>";
                    user3 += item.ID;
                    user3 += ":";
                    if (item.type.length >= 8) {
                        user3 += "<td>" + item.type.substring(0, 7) + "...</td>"
                    } else {
                        user3 += "<td>" + item.type + "</td>"
                    }
                    user3 += "</option>";

                    switch (item.status) {
                        case "1": //库存状态 可暂存
                            user2 += "<option>";
                            user2 += item.ID;
                            user2 += ":";
                            if (item.type.length >= 8) {
                                user2 += "<td>" + item.type.substring(0, 7) + "...</td>"
                            } else {
                                user2 += "<td>" + item.type + "</td>"
                            }
                            user2 += "</option>";

                            break;

                        case "2": //暂存状态 可收回
                            user1 += "<option>";
                            user1 += item.ID;
                            user1 += ":";
                            if (item.type.length >= 8) {
                                user1 += "<td>" + item.type.substring(0, 7) + "...</td>"
                            } else {
                                user1 += "<td>" + item.type + "</td>"
                            }
                            user1 += "</option>";
                    }
                }
                user4 += "<option>";
                user4 += item.ID;
                user4 += ":";
                if (item.type.length >= 8) {
                    user4 += "<td>" + item.type.substring(0, 7) + "...</td>"
                } else {
                    user4 += "<td>" + item.type + "</td>"
                }
                user4 += "</option>";
            });
            $("#computer-save").html(user1); //把内容入到这个div中即完成
            $("#computer-give").html(user2); //把内容入到这个div中即完成
            $("#computer-send").html(user3); //把内容入到这个div中即完成
            $("#computer-update").html(user4); //把内容入到这个div中即完成
            $("#computer-delete").html(user4); //把内容入到这个div中即完成
        }
    })
}