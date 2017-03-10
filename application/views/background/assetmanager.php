<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/7
 * Time: 16:17
 */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        #asset_left {
            margin-top: 10px;
            padding: 20px;
            background-color: #858DA8;
            width: 700px;
            border-radius: 5px;
            float: left;
            text-align: center;
        }

        #asset_left th {
            width: 100px;
            height: 30px;
            margin: 0px;
        }

        #asset_left tr {
            width: 400px;
            height: 30px;
            margin: 0px;
        }

        #asset_left td {
            width: 100px;
            height: 30px;
            margin: 0px;
        }

        #asset_right {
            margin-top: 10px;
            margin-left: 20px;
            padding: 20px;
            background-color: #858DA8;
            width: 500px;
            height: 240px;
            border-radius: 5px;
            float: left;
        <?php
if (isset($msg) && $msg == "ok") {
 echo "display: none;";
}
?>
        }

        #asset_right tr {
            width: 500px;
            height: 30px;
            margin: 0px;
        }

        #asset_right .td1 {
            width: 100px;
            height: 30px;
            margin: 0px;
            text-align: right;
        }

        #asset_right .td2 {
            width: 200px;
            height: 30px;
            margin: 0px;
            text-align: left;
        }

        #asset_right label {
            color: red;
        }

        #asset_right input {
            width: 190px;
        }
    </style>
</head>
<body>
<div class="contentTitle">
    <button onclick="showAddAssetPanel()">添加资产</button>
    <button onclick='deleteAllAsset()'>清空资产</button>
</div>
<div id="asset_left">
    <table id="asset_tabel" border="1">
        <tr>
            <th>资产名称</th>
            <th>资产编号</th>
            <th>用户名</th>
            <th>价格</th>
            <th>购入时间</th>
            <th>报废时间</th>
            <th>
                <button onclick="deleteSelectedAsset()">删除选中</button>
            </th>
        </tr>
        <?php
        foreach ($asset as $row) {
            echo "<tr id=" . $row['id'] . " onclick='selectedAsset(this)'>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo " <td>" . $row['PID'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['buyingtime'] . "</td>";
            echo "<td>" . $row['scraptime'] . "</td>";
            echo "<td><button" . " onclick='deleteAsset(" . $row['id'] . ")'>删</button><button class='btn'" . " onclick='showModifyAssetPanel(" . $row['id'] . ")'>修</button></td>";
            echo "</tr>";
        }
        echo "<tr><td>总个数：" . $count . "</td></tr>"
        ?>
    </table>
</div>
<div id="asset_right">
    <div>
        <form id="form_add_asset">
            <table border="1">
                <tr>
                    <td class="td1">资产名称:</td>
                    <td class="td2"><input type="text" id="name" name="name"
                                           value="<?php if (isset($curAsset[0]['name'])) echo $curAsset[0]['name']; ?>"/>
                    </td>
                    <td class="td2"><label id="tipname"></label>
                    </td>
                </tr>
                <tr>
                    <td class="td1">资产编号:</td>
                    <td class="td2"><input type="text" id="PID" name="PID"
                                           value="<?php if (isset($curAsset[0]['PID'])) echo $curAsset[0]['PID']; ?>"/>
                    </td>
                    <td class="td2"><label id="tipPID"><?php if (isset($checkmsg)) echo "该资产编号已存在！" ?></label></td>
                </tr>
                <tr>
                    <td class="td1">用户名:</td>
                    <td class="td2"><input type="text" id="username" name="username"
                                           value="<?php if (isset($curAsset[0]['username'])) echo $curAsset[0]['username']; ?>"/>
                    </td>
                    <td class="td2"><label id="tipusername"></label></td>
                </tr>
                <tr>
                    <td class="td1">价格:</td>
                    <td class="td2"><input type="text" id="price" name="price"
                                           value="<?php if (isset($curAsset[0]['price'])) echo $curAsset[0]['price']; ?>"/>
                    </td>
                    <td class="td2"><label id="tipprice"></label></td>
                </tr>
                <tr>
                    <td class="td1">购入时间:</td>
                    <td class="td2"><input type="text" id="buyingtime" name="buyingtime"
                                           value="<?php if (isset($curAsset[0]['buyingtime'])) echo $curAsset[0]['buyingtime']; ?>"/>
                    </td>
                    <td class="td2"><label id="tipbuyingtime"></label>
                    </td>
                </tr>

                <tr>
                    <td class="td1">报废时间:</td>
                    <td class="td2"><input type="text" id="scraptime" name="scraptime"
                                                 value="<?php if (isset($curAsset[0]['scraptime'])) echo $curAsset[0]['scraptime']; ?>"/>
                    </td>
                    <td class="td2"><label id="tipscraptime"></label></td>
                </tr>
            </table>
        </form>
    </div>
    <div>
        <button onclick='<?php if (isset($curAsset[0]["name"])) echo "modifyAsset( " . $curAsset[0]['id'] . ")"; else echo "insetAsset()"; ?>'>
            确定
        </button>
        <button onclick='btnCancel()'> 取消</button>
    </div>
</div>
</body>
</html>
