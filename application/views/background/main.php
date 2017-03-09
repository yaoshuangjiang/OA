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
    <style type="text/css">

        body {
            width: 100%;
            height: 100%;
            font-family: 微软雅黑;
            font-size: 12px;;
            margin: 0;
            background-color: #FFFFFF;
        }

        #title {
            height: 50px;
            background-color: #858DA8;
            text-align: center;
            margin: 0px;
        }

        #title h1 {
            color: #2D2D3F;
            text-shadow: 0 0 10px;
            letter-spacing: 1px;
            margin: 0 auto;
        }

        #list {
            width: 200px;
            height: 100%;
            background-color: #858DA8;
            float: left;
            margin: 10px;
        }

        #list h3 {
            background-color: #2D2D3F;
            color: #229955;
            margin: 0 auto;
            margin-bottom: 5px;
            text-align: center;
        }

        #list li {
            text-align: left;
            margin-bottom: 5px;
            margin-left: 15px;
            font-size: 14px;
        }

        #content {
            width: 1000px;
            height: 1000px;
            float: left;
            margin: 10px;
        }

    </style>
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/username.js"></script>
    <script type="text/javascript">
        function showContent(type) {
            showRightContent("<?php echo base_url()  ?>Showcontent/sendcontent?type=" + type + "&" +
                Math.random().toString());
        }
    </script>
</head>
<body>

<div id="title">
    <h1>OA后台管理系统</h1>
</div>
<div id="span">
</div>
<div id="list">
    <h3>菜单栏</h3>
    <ul>
        <li><a href="###" onclick="showContent(0)">用户管理</a></li>
        <li><a href="###" onclick="showContent(1)">用户组管理</a></li>
        <li><a href="###" onclick="showContent(2)">资产管理</a></li>
        <li><a href="###" onclick="showContent(3)">信息发布</a></li>
        <li><a href="###" onclick="showContent(4)">文档管理</a></li>
    </ul>
    <button id="bt_test" onclick='insert_user("<?php echo base_url()?>Showcontent/insert_user?" + Math.random().toString())'>test</button>
</div>

<div id="content">
</div>
</body>
</html>
