<?php
namespace app\admin\controller;

use think\Cache;
use think\Controller;
use think\Db;

class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //验证登录

        //验证权限
        $module = $this->request->module();
        $controller = $this->request->controller();
        $action = $this->request->action();
        $url_str = $module. '/'. lcfirst($controller). '/'. $action;

        $url_info = Db::name('perm')
            ->where('name', $url_str)
            ->find();
        $url_id = isset($url_info['id']) ? $url_info['id'] : 0;
        //假设 session_id = 1;
        $session_id = 1;
        $group_id = Db::name('admin')->where('id', $session_id)->find()['group_id'];
        $perm_ids = Db::name('group')->where('id', $group_id)->find()['perm_ids'];
        Cache::set('perm_ids', $perm_ids);
        //ALL权限不验证截停
        if($perm_ids == 'ALL'){
            return;
        }
        //普通权限
        $perm_ids_arr = json_decode($perm_ids, true);
        if(empty($perm_ids_arr)){
            $perm_ids_arr = [];
        }
        Cache::set('perm_ids_arr', $perm_ids_arr);

        if(!in_array($url_id, $perm_ids_arr)){
            echo 'no perm';
            exit;
        }

    }

    public function plist($table_name)
    {
        $all_data = Db::name($table_name)->order('id', 'desc')->select();
        $this->assign('all_data', $all_data);
        return $this->fetch();
    }

    public function msg($is, $msg='succ|error', $url='|')
    {
        $msg_arr = explode('|', $msg);
        $url_arr = explode('|', $url);

        if($is){
            $this->success($msg_arr[0], $url_arr[0]);
        }else{
            $this->error($msg_arr[1], $url_arr[1]);
        }
        
    }




}
