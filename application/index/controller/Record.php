<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Cache;

class Record extends Controller
{
	public function keep(){
		$value = 'yyyyy';
		$result = Cache::set('name',$value,3600);
		var_dump($result);
	}
}