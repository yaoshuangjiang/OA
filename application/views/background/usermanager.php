<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/7
 * Time: 15:49
 */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        #list1 {
        }

        #user_left {
            margin-top: 10px;
            padding: 20px;
            background-color: #858DA8;
            width: 500px;
            border-radius: 5px;
            float: left;
            text-align: center;
        }

        #user_left th {
            width: 100px;
            height: 30px;
            margin: 0px;
        }

        #user_left tr {
            width: 400px;
            height: 30px;
            margin: 0px;
        }

        #user_left td {
            width: 100px;
            height: 30px;
            margin: 0px;
        }

        #user_right {
            margin-top: 10px;
            margin-left: 20px;
            padding: 20px;
            background-color: #858DA8;
            width: 500px;
            height: 210px;
            border-radius: 5px;
            float: left;
        <?php
if (isset($msg) && $msg == "ok") {
 echo "display: none;";
}
?>
        }

        #user_right tr {
            width: 500px;
            height: 30px;
            margin: 0px;
        }

        #user_right .td1 {
            width: 100px;
            height: 30px;
            margin: 0px;
            text-align: right;
        }

        #user_right .td2 {
            width: 200px;
            height: 30px;
            margin: 0px;
            text-align: left;
        }

        #user_right label {
            color: red;
        }

        #user_right input {
            width: 190px;
        }

    </style>
</head>
<body>

<div id="list1">
    <div class="contentTitle">
        <button onclick="showAddUserPanel()">添加用户</button>
        <button onclick='deleteAllUser()'>删除全部用户</button>
    </div>
    <div id="user_left">
        <table id="user_tabel" border="1">
            <tr>
                <th>用户名</th>
                <th>电话</th>
                <th>员工号</th>
                <th>证件号</th>
                <th>
                    <button onclick="deleteSelectedUser()">删除选中</button>
                </th>
            </tr>
            <?php
            foreach ($user as $row) {
                echo "<tr id=" . $row['id'] . " onclick='selectedUser(this)'>";
                echo "<td>" . $row['username'] . "</td>";
                echo " <td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['usernumber'] . "</td>";
                echo "<td>" . $row['PID'] . "</td>";
                echo "<td><button" . " onclick='deleteUser(" . $row['id'] . ")'>删</button><button class='btn'" . " onclick='showModifyUserPanel(" . $row['id'] . ")'>修</button></td>";
                echo "</tr>";
            }
            echo "<tr><td>总个数：" . $count . "</td></tr>"
            ?>
        </table>
    </div>
    <div id="user_right">
        <div>
            <form id="form_add">
                <table border="1">
                    <tr>
                        <td class="td1">用户名:</td>
                        <td class="td2"><input type="text" id="username" name="username"
                                               value="<?php if (isset($curuser[0]['username'])) echo $curuser[0]['username']; ?>"/>
                        </td>
                        <td class="td2"><label id="tipusername"><?php if (isset($checkmsg)) echo "该用户名已存在！" ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">密码:</td>
                        <td class="td2"><input type="text" id="password" name="password"
                                               value="<?php if (isset($curuser[0]['password'])) echo $curuser[0]['password']; ?>"/>
                        </td>
                        <td class="td2"><label id="tippassword"></label></td>
                    </tr>
                    <tr>
                        <td class="td1">电话:</td>
                        <td class="td2"><input type="text" id="mobile" name="mobile"
                                               value="<?php if (isset($curuser[0]['mobile'])) echo $curuser[0]['mobile']; ?>"/>
                        </td>
                        <td class="td2"><label id="tipmobile"></label></td>
                    </tr>
                    <tr>
                        <td class="td1">员工号:</td>
                        <td class="td2"><input type="text" id="usernumber" name="usernumber"
                                               value="<?php if (isset($curuser[0]['usernumber'])) echo $curuser[0]['usernumber']; ?>"/>
                        </td>
                        <td class="td2"><label id="tipusernumber"><?php if (isset($checkmsg)) echo "该员工号已存在！" ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">证件号:</td>
                        <td class="td2"><input type="text" id="PID" name="PID"
                                               value="<?php if (isset($curuser[0]['PID'])) echo $curuser[0]['PID']; ?>"/>
                        </td>
                        <td class="td2"><label id="tipPID"><?php if (isset($checkmsg)) echo "该证件号已存在！" ?></label></td>
                    </tr>
                </table>
            </form>
        </div>
        <div style="width: 300px;height: 30px;">
            <button onclick='<?php if (isset($curuser[0]["username"])) echo "modifyUser( " . $curuser[0]['id'] . ")"; else echo "insertUser()"; ?>'>
                确定
            </button>
            <button onclick='btnCancel()'> 取消</button>
        </div>
    </div>
</div>
</body>
</html>

