<?php
namespace app\index\controller;
use app\index\model\User;
use think\Controller;
use think\Request;

class Index extends Controller
{
	public function _initialize()//自动加载方法
	{
		echo 'init<br/>';
	}

    public function index()//添加了use think\Controller还有class Index extends Controller才有页面渲染
    {
        return $this->fetch('index');
    }

    public function test()//类的使用
    {   
    	$result = new \my\Test();
    	$say = $this->request->get('say');
    	$result->sayHello($say);
    }

    public function user()//model的使用
    {
    	$user = new User();
    	$result = $User->save($data);
		if($result){
		//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
			$this->success('新增成功', 'User/list');
		}else{
		//错误页面的默认跳转页面是返回前一页，通常不需要设置
			$this->error('新增失败');
		}
    }

    public function call()//request请求url相关资源，添加use think\Request;
    {
    	$request = Request::instance();
    	// 获取当前域名
		echo 'domain: ' . $request->domain() . '<br/>';
		// 获取当前入口文件
		echo 'file: ' . $request->baseFile() . '<br/>';
		// 获取当前URL地址 不含域名
		echo 'url: ' . $request->url() . '<br/>';
		// 获取包含域名的完整URL地址
		echo 'url with domain: ' . $request->url(true) . '<br/>';
		// 获取当前URL地址 不含QUERY_STRING
		echo 'url without query: ' . $request->baseUrl() . '<br/>';
		// 获取URL访问的ROOT地址
		echo 'root:' . $request->root() . '<br/>';
		// 获取URL访问的ROOT地址
		echo 'root with domain: ' . $request->root(true) . '<br/>';
		// 获取URL地址中的PATH_INFO信息
		echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
		// 获取URL地址中的PATH_INFO信息 不含后缀
		echo 'pathinfo: ' . $request->path() . '<br/>';
		// 获取URL地址中的后缀信息
		echo 'ext: ' . $request->ext() . '<br/>';

		echo '请求方法：' . $request->method() . '<br/>';
		echo '资源类型：' . $request->type() . '<br/>';
		echo '访问ip地址：' . $request->ip() . '<br/>';
		echo '是否AJax请求：' . var_export($request->isAjax(), true) . '<br/>';
		echo '请求参数：';
		dump($request->param());
		echo '请求参数：仅包含name';
		dump($request->only(['name']));
		echo '请求参数：排除name';
		dump($request->except(['name']));

		//之后经常用到
		echo "当前模块名称是" . $request->module();
		echo "当前控制器名称是" . $request->controller();
		echo "当前操作名称是" . $request->action();
    }
}
