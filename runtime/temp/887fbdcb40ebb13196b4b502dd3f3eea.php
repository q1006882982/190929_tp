<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\phpstudy_pro\WWW\lp\public/../application/admin\view\test\index.html";i:1569488801;s:63:"D:\phpstudy_pro\WWW\lp\application\admin\view\public\_meta.html";i:1569486466;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="/static/admin1/css/common.css">
<script src="/static/admin1/js/base.js"></script>

    <link rel="stylesheet" href="/static/admin1/css/list.css">
    <title>list</title>
</head>
<body>
<div class="container">
    <div class="search">
        <form action="">
            <select name="search" class="input_select">
                <option value="">请选择</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <input type="text" class="input_text" name="search1" placeholder="search">
            <input type="submit" class="input_submit" value="search">
        </form>
    </div>
    <div class="do">
        <button type="button" class="button">新增</button>
        <button type="button" class="button">批量删除</button>
    </div>
    <div class="list">
        <table class="mtable">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>time</th>
                <th style="width: 13%;">do</th>
            </tr>
            <tr>
                <td>id</td>
                <td>id</td>
                <td>id</td>
                <td>id</td>
                <td>
                    <button type="button" class="button">修改</button>
                    <button type="button" class="button">删除</button>
                </td>
            </tr>
            <tr>
                <td>id</td>
                <td>id</td>
                <td>id</td>
                <td>id</td>
                <td>
                    <button type="button" class="button">修改</button>
                    <button type="button" class="button">删除</button>
                </td>
            </tr>
        </table>
        <div class="page">
            <ul>
                <li class="active"><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>