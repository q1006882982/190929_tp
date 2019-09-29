<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\phpstudy_pro\WWW\lp\public/../application/admin\view\test\form.html";i:1569575591;s:63:"D:\phpstudy_pro\WWW\lp\application\admin\view\public\_meta.html";i:1569486466;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="/static/admin1/css/common.css">
<script src="/static/admin1/js/base.js"></script>

    <link rel="stylesheet" href="/static/admin1/css/form.css">
    <title>form</title>
</head>
<body>
<div class="container">
    <form action="" class="mform">
        <p>
            <span>name:</span>
            <input type="text" name="name" class="input_text">
        </p>
        <p>
            <span>age:</span>
            <input type="text" name="age" class="input_text">
        </p>
        <p class="input_radio">
            <span>sex:</span>
            <input type="radio" name="r1"><span>是</span>
            <input type="radio" name="r1"><span>否</span>
        </p>
        <p class="input_checkbox">
            <span>like:</span>
            <input type="checkbox" name="c1"><span>是</span>
            <input type="checkbox" name="c1"><span>否</span>
        </p>
        <p>
            <span>select:</span>
            <select name="s1" class="input_select">
                <option value="">pleace select</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </p>
        <p>
            <span>text:</span>
            <textarea name="" cols="30" rows="10" class="input_textarea"></textarea>
        </p>
        <p>
            <input type="submit" class="input_submit">
        </p>
        <!--单选-->
        <!--复选-->
        <!--select-->
        <!--textarea-->
    </form>
</div>

</body>
</html>