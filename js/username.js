/**
 * Created by yao on 2017/3/8.
 */
var baseurl = "http://localhost:9096/OA/";

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

function insert_user() {
    if (!check1()) {
        return;
    }

    $.ajax({
        type: "POST",
        url: baseurl + "Showcontent/insert_user?" + Math.random().toString(),
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

function showRightContent(type) {
    $.ajax({
        type: "GET",
        url: baseurl + "Showcontent/sendcontent?type=" + type + "&" + Math.random().toString(),
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
    if (obj.style.backgroundColor == 'white') {
        obj.style.backgroundColor = '#858DA8';
    } else {
        obj.style.backgroundColor = 'white';
    }
}

function deluser(id) {
    if (confirm("请确定是否删除该用户！")) {
        $.ajax({
            type: "GET",
            url: baseurl + "Showcontent/del_user?type=1&id=" + id + "&" + Math.random().toString(),
            async: true,
            error: function () {
                alert("Connection error");
            },
            success: function (data) {
                $("#content").html(data); //data即为后台返回的数据
            }
        })
    }
}

function delsselectuser() {

    var id = "";
    var table = document.getElementById('table1');
    for (i = 0; i < table.rows.length; i++) {
        if (table.rows(i).style.backgroundColor == 'white') {
            if (id == "") {
                id = table.rows(i).id;
            } else {
                id = id + "," + table.rows(i).id;
            }
        }
    }

    $.ajax({
        type: "GET",
        url: baseurl + "Showcontent/del_user?type=1&id=" + id + "&" + Math.random().toString(),
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

function bt_delalluser(url) {
    if (confirm("请确定是否删除全部用户！")) {
        $.ajax({
            type: "GET",
            url: baseurl + "Showcontent/del_user?type=0&" + Math.random().toString(),
            async: true,
            error: function () {
                alert("Connection error");
            },
            success: function (data) {
                $("#content").html(data); //data即为后台返回的数据
            }
        })
    }
}

function bt_adduser() {
    document.getElementById('user_right').style.display = "block";
}

function addusercancel() {
    document.getElementById('user_right').style.display = "none"
}

function showmodifyuser(id) {
    $.ajax({
        type: "GET",
        url: baseurl + "Showcontent/get_user?id=" + id + "&" + Math.random().toString(),
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

function modify_user(id) {
    if (!check1()) {
        return;
    }

    var post = $('#form_add').serialize();
    post += "&id=" + id;

    $.ajax({
        type: "POST",
        url: baseurl + "Showcontent/modify_user?" + Math.random().toString(),
        async: true,
        data: post,// 你的formid
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}