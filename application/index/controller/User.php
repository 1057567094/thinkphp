<?php
namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Controller;
use think\Request;
use think\Db;

class User extends Controller
{
	public function login() //用model来访问数据库，因为控制器和模型都是user.php所以重名改use app\index\model\User as UserModel;
	{
		// $search=db('user')->where('id',1)->find();
		// $search=Db::connect('db_config1')->table('think_user')->where('id',1)->find();//必须添加use think\Db;
		
		// 大于某个时间
		// Db::table('think_user')->whereTime('birthday', '>=', '1970-10-1')->select();
		// // 小于某个时间
		// Db::table('think_user')->whereTime('birthday', '<', '2000-10-1')->select();
		// // 时间区间查询
		// Db::table('think_user')->whereTime('birthday', 'between', ['1970-10-1', '2000-1
		// 0-1'])->select();
		// // 不在某个时间区间
		// Db::table('think_user')->whereTime('birthday', 'not between', ['1970-10-1', '20
		// 00-10-1'])->select();
		$user = new UserModel();//model查询数据库
		$result = $user->where('id',1)->find();
		var_dump($result);
		exit();
	}
}
