<?php
namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Controller;
use think\Request;
use think\Db;

class User extends Controller
{
	public function login(){
		// $search=db('user')->where('id',1)->find();
		// $search=Db::connect('db_config1')->table('think_user')->where('id',1)->find();//必须添加
  //   	var_dump($search);
  //   	exit();
		$user = new UserModel();//model查询数据库
		$result = $user->where('id',1)->find();
		var_dump($result);
		exit();
	}
}
