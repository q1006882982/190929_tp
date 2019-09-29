<?php
namespace app\admin\controller;


class Database extends Base
{
    public function index()
    {
        //数据库管理列表
        return '数据库管理列表';
    }

    public function backup()
    {
        //数据备份
        return '数据备份';
    }

    public function other()
    {
        //oher
        return 'other';
    }
}
