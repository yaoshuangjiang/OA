<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 17:47
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>OA后台操作系统</title>
    <style type="text/css">

        body {
            width: 100%;
            height: 100%;
            font-family: 微软雅黑;
            margin: 0;
            background-color: #4A374A;
        }

        .login {
            position: absolute;
            top: 40%;
            left: 40%;
            margin: auto 0;
            width: 700px;
            height: 300px;
        }

        .login h1 {
            color: #fff;
            text-shadow: 0 0 10px;
            letter-spacing: 1px;
        }

        input {
            width: 300px;
            height: 20px;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 13px;
            color: #fff;
            /*text-shadow: 1px 1px 1px;*/
            border-top: 1px solid #312E3D;
            border-left: 1px solid #312E3D;
            border-right: 1px solid #312E3D;
            border-bottom: 1px solid #56536A;
            border-radius: 5px;
            background-color: #2D2D3F;
        }

        button {
            width: 320px;
            min-height: 20px;
            display: block;
            color: #fff;
            border: 1px #3762bc;
            background-color: #4a77d4;
            padding: 10px;
            font-size: 15px;
            line-height: normal;
            border-radius: 5px;
        }

        th {
            text-align: center;
        }

        td {
            text-align: left;
        }

        label {
            color: red;
        }
    </style>

    <script type="text/javascript">
        function check() {
            var user = document.getElementById("username").value;
            var pwd = document.getElementById("password").value;
            document.getElementById("tipuser").innerHTML = "";
            document.getElementById("tippwd").innerHTML = "";
            var checked = true;
            if (user == "" || user == "用户名:") {
                document.getElementById("tipuser").innerHTML = "*用户名不可以为空！";
                checked = false;
            }
            else if (user.length > 16) {
                document.getElementById("tipuser").innerHTML = "*用户名不超过16个字符！";
                checked = false;
            }

            if (pwd == "" || pwd == "密码:") {
                document.getElementById("tippwd").innerHTML = "*密码不可以为空！";
                checked = false;
            }
            else if (pwd.length > 16) {
                document.getElementById("tippwd").innerHTML = "*密码不超过16个字符！";
                checked = false;
            }

            return checked;
        }
    </script>
</head>

<body>
<div class="login">
    <table>
        <tr>
            <th width="320"><h1>OA后台登录</h1></th>
            <th width="320"></th>
        </tr>
        <form name="sub" action="<?php echo base_url()  ?>loginbackground/check" method="post"
              onsubmit="return check()">
            <tr>
                <td><input type="text" placeholder="用户名:" name="username" id="username"/></td>
                <td><label id="tipuser"></label></td>
            </tr>
            <tr>
                <td><input type="password" placeholder="密码:" name="password" id="password"/></td>
                <td><label id="tippwd"></label></td>
            </tr>
            <tr>
                <td>
                    <button type="submit">登录</button>
                </td>
            </tr>
        </form>
        <tr>
            <td><label id="re"><?php if(isset($response)){echo $response;} ?></label></td>
        </tr>
    </table>
</div>
</body>
</html>
