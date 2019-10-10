<?php
namespace app\index\controller;
use app\index\model\User as UserModel;
use app\index\validate\User as UserVld;
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
		$result = $user->all();
		foreach ($result as $key => $value){
			$data = [
				'id'=>$value->id,
				'name'=>$value->name,
				'password'=>$value->password,
				'status'=>$value->status,
				'button'=>$value->button,
				];
			$list[] = $data;
		}
		$this->assign('list',$list);
		$this->assign('title','这是标题');
		return $this->fetch('login');
	}

	public function check1() //利用think\Controller自带的validate验证：1值2要求3返回结果
	{
		$result = $this->validate(
		[
		    'name' => 'ddd',
		    'age' => 'sss',
		    'email' => 'thinkphp',
		],
		[
		    'name' => 'require|max:25',
		    'age' => 'number|between:1,120',
		    'email'  => 'email',
		],
		[
			'name.require' => '名称必须',
			'name.max' => '名称最多不能超过25个字符',
			'age.number' => '年龄必须是数字',
			'age.between' => '年龄只能在1-120之间',
			'email' => '邮箱格式错误',
		]);
		if(true !== $result){
		  	// 验证失败 输出错误信息 格式为string
		  	print($result);
		}
	}

	public function check2()//利用think\Validate的验证器，类似类的使用
	{
		$data = array();
		$data = [
			'username' => 'ddd',
			'email' => 'ddd',
			'qq' => '1057567094',
			'phone' => '111',
		];
		$validate = new UserVld();
		$result = $validate->batch()->check($data);
		$error = $validate->getError();//错误返回是数组array
		var_dump($error);
	}
}

