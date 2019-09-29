<?php
namespace app\admin\controller;


use think\Db;

class Group extends Base
{
    private $main_table = '';
    private $list_url = '';

    public function __construct()
    {
        parent::__construct();
        $this->main_table = 'group';
        $this->list_url = url('admin/group/mlist');
    }

    public function mlist()
    {
        $all_data = Db::name($this->main_table)->select();
        $this->assign('all_data', $all_data);
        return $this->fetch();
    }

    public function form()
    {
        $id = input('id/d');
        $all_perm = Db::name('perm')
            ->order('controller', 'desc')
            ->select();

        $res = [];
        foreach ($all_perm as $item) {
            $key = $item['controller'];
            $res[$key][] = $item;
        }
//        var_dump($res);

        if($id){
            $one_data = Db::name($this->main_table)->where('id', $id)->find();
            //g1 组, $all_perm=[]
            if($one_data['name'] == 'g1'){
                $res = [];
            }
            $this->assign('one_data', $one_data);
        }

        $this->assign('all_perm', $res);
        return $this->fetch();
    }

    public function save()
    {
        if($this->request->isPost()){
            $id = input('id/d');
            $data = input('post.');

            if(isset($data['perm'])){
                $data['perm_ids'] = json_encode($data['perm']);
            }

            if($id){
                $res = Db::name($this->main_table)
                    ->where('id', $id)
                    ->update($data);
            }else{
                $res = Db::name($this->main_table)
                    ->insertGetId($data);
            }

//            $this->msg($res,'succ|err', $this->list_url.'|');
        }
    }

    public function del()
    {
        $id = input('id/d');
        $res = Db::name($this->main_table)->where('id', $id)->delete();
        $this->msg($res,'succ|err', $this->list_url.'|');
    }

}
