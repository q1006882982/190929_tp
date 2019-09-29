<?php
namespace app\admin\controller;

use lp\Page;
use think\Controller;
use think\Db;

class Test extends Controller
{
    public function page()
    {
        $page = input('page/d', 1);
        $page_size = 2;
        $page_num = ($page - 1) * $page_size;
        $Page = new Page(4, $page_size);
        $page_menu = $Page->show();
        $this->assign('page_menu', $page_menu);
        $limit = $page_num . ',' .$page_size;
        //where 数组
        $res = Db::name('perm')
            ->where('menu_id', 'in', [5,6])
            ->limit($limit)
            ->select();
        var_dump($res);
        return $this->fetch();

    }

    public function index()
    {
        return $this->fetch();
    }

    public function form()
    {
        return $this->fetch();

    }


}
