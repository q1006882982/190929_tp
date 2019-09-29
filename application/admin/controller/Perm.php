<?php
namespace app\admin\controller;


use think\Db;

class Perm extends Base
{
    private $main_table = 'perm';

    public function mlist()
    {
        return parent::plist($this->main_table);
    }

    public function form()
    {
        $id = input('id/d');
        if($id){
            $one_data = Db::name($this->main_table)->where('id', $id)->find();
            $this->assign('one_data', $one_data);
        }

        //目录菜单
        $all_sidebar = Db::name('menu')->where('pid', '<>', 0)->select();
        $this->assign('all_sidebar', $all_sidebar);

        return $this->fetch();
    }

    public function save()
    {
        if($this->request->isPost()){
            $id = input('id/d');
            $data = input('post.');
            $controller = explode('/', input('name'))[1];
            $data['controller'] = $controller;
            if($id){
                $res = Db::name($this->main_table)
                    ->where('id', $id)
                    ->update($data);
            }else{
                $res = Db::name($this->main_table)
                    ->insertGetId($data);
            }

            $url = url('admin/perm/mlist') . '|';
            $this->msg($res,'succ|err', $url);
        }
    }

    public function del()
    {
        $id = input('id/d');
        $res = Db::name($this->main_table)->where('id', $id)->delete();
        $url = url('admin/perm/mlist') . '|';
        $this->msg($res,'succ|err', $url);
    }

}
