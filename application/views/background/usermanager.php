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
            width: 1000px;
            height: 1000px;
        }

        #list1 .table1 {
            width: 400px;
            text-align: center;
            float: left;
        }

        .table1 th {
            width: 100px;
            height: 30px;
            margin: 0px;
        }

        .table1 tr {
            width: 400px;
            height: 30px;
            margin: 0px;
        }

        .table1 td {
            width: 100px;
            height: 30px;
            margin: 0px;
        }

        #list1 .table2 {
            width: 500px;
            height: 150px;
            margin-left: 10px;
        }

        .table2 tr {
            width: 500px;
            height: 30px;
            margin: 0px;
        }

        .table2 .td1 {
            width: 100px;
            height: 30px;
            margin: 0px;
            text-align: right;
        }

        .table2 .td2 {
            width: 200px;
            height: 30px;
            margin: 0px;
            text-align: left;
        }

        .table2 label {
            color: red;
        }

        .table2 input {
            width: 190px;
        }

    </style>
</head>
<body>

<div id="list1">
    <div style="width: 1000px;height: 30px">
        <button id="bt_test1">test</button>
    </div>
    <div>
        <table id="table1" class="table1" border="1">
            <tr>
                <th>用户名</th>
                <th>电话</th>
                <th>员工号</th>
                <th>证件号</th>
                <th><button onclick="delsselectuser()">删除选中</button></th>
            </tr>
            <?php
            foreach ($user as $row) {
                echo "<tr id=" . $row['id'] . " onclick='selectuser(this)'>";
                echo "<td>" . $row['username'] . "</td>";
                echo " <td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['usernumber'] . "</td>";
                echo "<td>" . $row['PID'] . "</td>";
                echo "<td><button " . " onclick='deluser(" . $row['id'] . ")'>删除</button></td>";
                echo "</tr>";
            }
            echo "<tr><td>总个数：" . $count . "</td></tr>"
            ?>
        </table>
    </div>
    <div style="float: left">
        <div>
            <div>
                <form id="form_add">
                    <table class="table2" border="1">
                        <tr>
                            <td class="td1">用户名:</td>
                            <td class="td2"><input type="text" id="username" name="username"/></td>
                            <td class="td2"><label id="tipusername"></label></td>
                        </tr>
                        <tr>
                            <td class="td1">密码:</td>
                            <td class="td2"><input type="password" id="password" name="password"/></td>
                            <td class="td2"><label id="tippassword"></label></td>
                        </tr>
                        <tr>
                            <td class="td1">电话:</td>
                            <td class="td2"><input type="text" id="mobile" name="mobile"/></td>
                            <td class="td2"><label id="tipmobile"></label></td>
                        </tr>
                        <tr>
                            <td class="td1">员工号:</td>
                            <td class="td2"><input type="text" id="usernumber" name="usernumber"/></td>
                            <td class="td2"><label id="tipusernumber"></label></td>
                        </tr>
                        <tr>
                            <td class="td1">证件号:</td>
                            <td class="td2"><input type="text" id="PID" name="PID"/></td>
                            <td class="td2"><label id="tipPID"></label></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div style="width: 250px;height: 30px;text-align: center">
                <button onclick='insert_user("<?php echo base_url() ?>Showcontent/insert_user?" + Math . random() . toString())'>
                    确定
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>

