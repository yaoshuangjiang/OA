<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/7
 * Time: 11:28
 */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>OA后台操作系统</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/all.css" type="text/css" />
    <style type="text/css">

        #title {
            height: 50px;
            background-color: #858DA8;
            text-align: center;
        }

        #title h1 {
            color: #2D2D3F;
            text-shadow: 0 0 10px;
            padding: 10px;
        }

        #page {
            width: 2000px;
            height: 1500px;
            float: left;
        }

        #list {
            border-radius: 5px;
            width: 200px;
            height: 100%;
            background-color: #858DA8;
            float: left;
            margin: 10px;
            text-align: left;
        }

        #list h3 {
            height: 25px;
            width: 190px;
            border-radius: 5px;
            background-color: #2D2D3F;
            color: #229955;
            margin-top: 0px;
            margin-bottom: 5px;
            text-align: center;
            padding: 5px;
        }

        #list li {
            list-style-type: none;
            text-align: center;
            background-color: #2D2D3F;
            width: 200px;
            height: 20px;
            border: 1px #2e8ece;
            border-radius: 5px;
            font-size: 14px;
            margin-left: -40px;
            cursor: pointer;
            color: #ffffff;
        }

        #content {
            width: 1500px;
            height: 100%;
            float: left;
            background-color: #f2f2f2;
            border-radius: 5px;
            margin: 10px;
        }

    </style>
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/username.js"></script>
    <script type="text/javascript">

        function showContent(obj, type) {
            document.getElementById("li_user").style.backgroundColor = "#2D2D3F";
            document.getElementById("li_user").style.color = "#FFFFFF";
            document.getElementById("li_group").style.backgroundColor = "#2D2D3F";
            document.getElementById("li_group").style.color = "#FFFFFF";
            document.getElementById("li_asset").style.backgroundColor = "#2D2D3F";
            document.getElementById("li_asset").style.color = "#FFFFFF";
            document.getElementById("li_notice").style.backgroundColor = "#2D2D3F";
            document.getElementById("li_notice").style.color = "#FFFFFF";
            document.getElementById("li_document").style.backgroundColor = "#2D2D3F";
            document.getElementById("li_document").style.color = "#FFFFFF";
            obj.style.backgroundColor = "#FFFFFF";
            obj.style.color = "#000000";

            showRightContent(type);
        }

        function limouseover(obj) {
            if (obj.style.backgroundColor == "rgb(255, 255, 255)")
                return;
            obj.style.backgroundColor = "#000000";
        }

        function limouseout(obj) {
            if (obj.style.backgroundColor == "rgb(255, 255, 255)")
                return;
            obj.style.backgroundColor = "#2D2D3F";
        }
    </script>
</head>
<body>

<div id="title">
    <h1>OA后台管理系统</h1>
</div>
<div id="span">
</div>
<div id="page">
    <div id="list">
        <h3>菜单栏</h3>
        <ul style="">
            <li id="li_user" onmouseover="limouseover(this)" on onmouseout="limouseout(this)"
                onclick="showContent(this,0)">
                <p>
                    用户管理</p>
            </li>
            <li id="li_group" onmouseover="limouseover(this)" onmouseout="limouseout(this)"
                onclick="showContent(this,1)">
                <p>
                    用户组管理</p></li>
            <li id="li_asset" onmouseover="limouseover(this)" onmouseout="limouseout(this)"
                onclick="showContent(this,2)">
                <p>
                    资产管理</p></li>
            <li id="li_notice" onmouseover="limouseover(this)" onmouseout="limouseout(this)"
                onclick="showContent(this,3)">
                <p>
                    信息发布</p></li>
            <li id="li_document" onmouseover="limouseover(this)" onmouseout="limouseout(this)"
                onclick="showContent(this,4)"><p>
                    文档管理</p></li>
        </ul>
    </div>
    <div id="content">
    </div>
</div>
</body>
</html>
