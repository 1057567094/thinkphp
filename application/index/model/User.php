<?php
namespace app\index\model;
use think\Model;
class User extends Model
{
	public function getStatusAttr($value)
	{
		$status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
		return $status[$value];
	}
}