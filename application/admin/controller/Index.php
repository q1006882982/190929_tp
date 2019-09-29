<?php
namespace app\admin\controller;

use think\Cache;
use think\Db;

class Index extends Base
{
    public function index()
    {
        //显示菜单
        $all_menu = Db::name('menu')->where('pid', 0)->select();
        $perm_ids = Cache::get('perm_ids');
        $is_admin_group = $perm_ids == 'ALL';
        if(!$is_admin_group){
            $perm_ids_arr_str = implode(',', Cache::get('perm_ids_arr'));
        }

        foreach ($all_menu as $key=>$menu) {
            $all_menu[$key]['child'] = Db::name('menu')->where('pid', $menu['id'])->select();
            foreach ($all_menu[$key]['child'] as $s_key=>$s) {
                $where = '';
                if(!$is_admin_group){
                    $where .= "id in ({$perm_ids_arr_str}) and ";
                }
                $where .= "menu_id={$s['id']} ";
                $all_menu[$key]['child'][$s_key]['sidebar'] =
                    Db::name('perm')
                    ->where($where)
                    ->select();
                if(empty($all_menu[$key]['child'][$s_key]['sidebar'])){
                    unset($all_menu[$key]['child'][$s_key]);
                }
            }
            if(empty($all_menu[$key]['child'])){
                unset($all_menu[$key]);
            }

            //如果sidebar 的sidebar为空 删除本 sidebar
            //如果menu 的child为空 删除 本menu
        }

        $this->assign('all_menu', $all_menu);

        return $this->fetch();
    }


}
