<?php
namespace app\admin\controller;


class Module extends Base
{
    public function index()
    {
        //插件管理列表
        return '插件管理列表';
    }

    public function form()
    {
        //新增插件
        return '新增插件';
    }

    public function other()
    {
        //oher
        return 'other';
    }
}
