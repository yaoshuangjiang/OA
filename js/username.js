/**
 * Created by yao on 2017/3/8.
 */

function test() {
    alert("ok");
    return false;
}

function check1() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var mobile = document.getElementById('mobile').value;
    var usernumber = document.getElementById('usernumber').value;
    var PID = document.getElementById('PID').value;
    document.getElementById("tipusername").innerHTML = "";
    document.getElementById("tippassword").innerHTML = "";
    document.getElementById("tipmobile").innerHTML = "";
    document.getElementById("tipusernumber").innerHTML = "";
    document.getElementById("tipPID").innerHTML = "";

    var checked = true;
    if (username == "") {
        document.getElementById("tipusername").innerHTML = "*用户名不可以为空！";
        checked = false;
    }
    else if (username.length > 16) {
        document.getElementById("tipusername").innerHTML = "*用户名不超过16个字符！";
        checked = false;
    }

    if (password == "") {
        document.getElementById("tippassword").innerHTML = "*密码不可以为空！";
        checked = false;
    }
    else if (password.length > 16) {
        document.getElementById("tippassword").innerHTML = "*密码不超过16个字符！";
        checked = false;
    }

    if (mobile == "") {
        document.getElementById("tipmobile").innerHTML = "*电话号码不可以为空！";
        checked = false;
    }
    else if (mobile.length > 16) {
        document.getElementById("tipmobile").innerHTML = "*电话号码不超过16个字符！";
        checked = false;
    }

    if (usernumber == "") {
        document.getElementById("tipusernumber").innerHTML = "*员工号不可以为空！";
        checked = false;
    }
    else if (usernumber.length > 16) {
        document.getElementById("tipusernumber").innerHTML = "*员工号不超过16个字符！";
        checked = false;
    }

    if (PID == "") {
        document.getElementById("tipPID").innerHTML = "*证件号不可以为空！";
        checked = false;
    }
    else if (PID.length > 16) {
        document.getElementById("tipPID").innerHTML = "*证件号不超过16个字符！";
        checked = false;
    }

    return checked;
}

function insert_user(url) {
    if (!check1()) {
        return;
    }

    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: $('#form_add').serialize(),// 你的formid
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

function showRightContent(url) {
    $.ajax({
        type: "GET",
        url: url,
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

function selectuser(obj) {
    if (obj.style.backgroundColor == 'blue') {
        obj.style.backgroundColor = 'white';
    } else {
        obj.style.backgroundColor = 'blue';
    }
}

function deluser(id) {
    $.ajax({
        type: "GET",
        //url: url+"?id="+id+"&"+Math.random().toString(),
        url: "http://localhost:9096/OA/Showcontent/del_user?id=" + id + "&" + Math.random().toString(),
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

function delsselectuser() {

    var id = "";
    var table = document.getElementById('table1');
    for (i = 0; i < table.rows.length; i++) {
        if (table.rows(i).style.backgroundColor == 'blue') {
            if (id == "") {
                id = table.rows(i).id;
            } else {
                id = id + "," + table.rows(i).id;
            }
        }
    }

    $.ajax({
        type: "GET",
        url: "http://localhost:9096/OA/Showcontent/del_user?id=" + id + "&" + Math.random().toString(),
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}