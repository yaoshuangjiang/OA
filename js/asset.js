/**
 * Created by yao on 2017/3/10.
 */
var baseUrl = "http://localhost:9096/OA/";

function test() {
    alert("ok");
}


//检查添加资产的数据和合法性
function checkAsset() {
    var name = document.getElementById('name').value;
    var PID = document.getElementById('PID').value;
    var username = document.getElementById('username').value;
    var buyingtime = document.getElementById('buyingtime').value;
    var price = document.getElementById('price').value;
    var scraptime = document.getElementById('scraptime').value;
    document.getElementById("name").innerHTML = "";
    document.getElementById("PID").innerHTML = "";
    document.getElementById("username").innerHTML = "";
    document.getElementById("buyingtime").innerHTML = "";
    document.getElementById("price").innerHTML = "";
    document.getElementById("scraptime").innerHTML = "";

    var checked = true;
    if (name == "") {
        document.getElementById("tipname").innerHTML = "*资产名称不可以为空！";
        checked = false;
    }
    else if (name.length > 16) {
        document.getElementById("tipname").innerHTML = "*资产名称不超过16个字符！";
        checked = false;
    }

    if (PID == "") {
        document.getElementById("tipPID").innerHTML = "*资产编号不可以为空！";
        checked = false;
    }
    else if (PID.length > 16) {
        document.getElementById("tipPID").innerHTML = "*资产编号不超过16个字符！";
        checked = false;
    }

    if (username == "") {
        document.getElementById("tipusername").innerHTML = "*用户名不可以为空！";
        checked = false;
    }
    else if (username.length > 16) {
        document.getElementById("tipusername").innerHTML = "*用户名不超过16个字符！";
        checked = false;
    }

    if (price == "") {
        document.getElementById("tipprice").innerHTML = "*价格不可以为空！";
        checked = false;
    }
    else if (price.length > 16) {
        document.getElementById("tipprice").innerHTML = "*价格不超过16个字符！";
        checked = false;
    }

    if (buyingtime == "") {
        document.getElementById("tipbuyingtime").innerHTML = "*购入时间不可以为空！";
        checked = false;
    }
    else if (buyingtime.length > 16) {
        document.getElementById("tipbuyingtime").innerHTML = "*购入时间不超过16个字符！";
        checked = false;
    }

    if (scraptime == "") {
        document.getElementById("tipscraptime").innerHTML = "*报废时间不可以为空！";
        checked = false;
    }
    else if (scraptime.length > 16) {
        document.getElementById("tipscraptime").innerHTML = "*报废时间不超过16个字符！";
        checked = false;
    }

    return checked;
}

//添加资产
function insetAsset() {
    if (!checkAsset()) {
        return;
    }

    $.ajax({
        type: "POST",
        url: baseUrl + "Showcontent/insert_asset?" + Math.random().toString(),
        async: true,
        data: $('#form_add_asset').serialize(),// 你的formid
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

//选中资产列表中的一行记录
function selectedAsset(obj) {
    if (obj.style.backgroundColor == 'white') {
        obj.style.backgroundColor = '#858DA8';
    } else {
        obj.style.backgroundColor = 'white';
    }
}

//删除指定资产
function deleteAsset(id) {
    if (confirm("请确定是否删除该资产！")) {
        $.ajax({
            type: "GET",
            url: baseUrl + "Showcontent/del_asset?type=1&id=" + id + "&" + Math.random().toString(),
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

//删除选中资产
function deleteSelectedAsset() {

    if (confirm("请确定是否删除选中资产！")) {
        var id = "";
        var table = document.getElementById('asset_tabel');
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
            url: baseUrl + "Showcontent/del_asset?type=1&id=" + id + "&" + Math.random().toString(),
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

//删除所有资产
function deleteAllAsset() {
    if (confirm("请确定是否删除全部资产！")) {
        $.ajax({
            type: "GET",
            url: baseUrl + "Showcontent/del_asset?type=0&" + Math.random().toString(),
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

//取消按钮，隐藏添加修改资产面板
function btnCancel() {
    document.getElementById('asset_right').style.display = "none"
}

//显示添加资产面板
function showAddAssetPanel() {
    document.getElementById('asset_right').style.display = "block";
}

//显示修改资产面板
function showModifyAssetPanel(id) {
    $.ajax({
        type: "GET",
        url: baseUrl + "Showcontent/get_asset?id=" + id + "&" + Math.random().toString(),
        async: true,
        error: function () {
            alert("Connection error");
        },
        success: function (data) {
            $("#content").html(data); //data即为后台返回的数据
        }
    })
}

//修改资产信息
function modifyAsset(id) {
    if (!checkAsset()) {
        return;
    }

    var postPra = $('#form_add_asset').serialize();
    postPra += "&id=" + id;

    $.ajax({
        type: "POST",
        url: baseUrl + "Showcontent/modify_asset?" + Math.random().toString(),
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
