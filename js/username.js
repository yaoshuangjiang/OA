/**
 * Created by yao on 2017/3/8.
 */
var baseUrl = "http://localhost:9096/OA/";

function test() {
    alert("ok");
}

//检查添加用户的数据和合法性
function checkUser() {
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

//添加用户
function insertUser() {
    if (!checkUser()) {
        return;
    }

    $.ajax({
        type: "POST",
        url: baseUrl + "Showcontent/insert_user?" + Math.random().toString(),
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

//点击左侧导航，右面显示内容
function showRightContent(type) {
    $.ajax({
        type: "GET",
        url: baseUrl + "Showcontent/sendcontent?type=" + type + "&" + Math.random().toString(),
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

//选中用户列表中的一行记录
function selectedUser(obj) {
    if (obj.style.backgroundColor == 'white') {
        obj.style.backgroundColor = '#858DA8';
    } else {
        obj.style.backgroundColor = 'white';
    }
}

//删除指定用户
function deleteUser(id) {
    if (confirm("请确定是否删除该用户！")) {
        $.ajax({
            type: "GET",
            url: baseUrl + "Showcontent/del_user?type=1&id=" + id + "&" + Math.random().toString(),
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

//删除选中用户
function deleteSelectedUser() {
    if (confirm("请确定是否删除选中用户！")) {
        var id = "";
        var table = document.getElementById('user_tabel');
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
            url: baseUrl + "Showcontent/del_user?type=1&id=" + id + "&" + Math.random().toString(),
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

//删除所有用户
function deleteAllUser() {
    if (confirm("请确定是否删除全部用户！")) {
        $.ajax({
            type: "GET",
            url: baseUrl + "Showcontent/del_user?type=0&" + Math.random().toString(),
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

//显示添加用户面板
function showAddUserPanel() {
    document.getElementById('user_right').style.display = "block";
}

//取消按钮，隐藏添加修改用户面板
function btnCancel() {
    document.getElementById('user_right').style.display = "none"
}

//显示修改用户面板
function showModifyUserPanel(id) {
    $.ajax({
        type: "GET",
        url: baseUrl + "Showcontent/get_user?id=" + id + "&" + Math.random().toString(),
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

//修改用户信息
function modifyUser(id) {
    if (!checkUser()) {
        return;
    }

    var postPra = $('#form_add').serialize();
    postPra += "&id=" + id;

    $.ajax({
        type: "POST",
        url: baseUrl + "Showcontent/modify_user?" + Math.random().toString(),
        async: true,
        data: postPra,//post参数
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}