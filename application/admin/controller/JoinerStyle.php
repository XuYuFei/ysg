<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;

class JoinerStyle extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];

    protected function filter(&$map)
    {
        if ($this->request->param("title")) {
            $map['title'] = ["like", "%" . $this->request->param("title") . "%"];
        }
    }

    protected function afterAdd()
    {
        $this->clearCache();
    }

    public function afterEdit()
    {
        $this->clearCache();
    }

    protected function clearCache()
    {
        cache('JoinerStyle', null);
        cache('mobile_JoinerStyle', null);
    }
}
