<?php
namespace app\index\model;
use think\Model;
class User extends Model
{
	public function getStatusAttr($value)//此时status返回值不在是int是文字
	{
		$status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
		return $status[$value];
	}
}