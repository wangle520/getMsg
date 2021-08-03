<?php
 
namespace app\index\controller;
use app\addons\Wxeredis;

// 接收某个频道的消息方法
// 废弃 使用命令
class Subscribe{
    private $redis = null;
    public function __construct(){
        $redis = new Wxeredis;
        // $redis->connect('127.0.0.1',6379);
        // $redis->auth(); //密码 认证
        $this->redis = $redis->index();
    }

    public function index2(){
        // 获取对应频道的消息
        // 容易阻塞 504
        $this->redis->subscribe(['pubMsg:index'],function($instance,$channel,$msg){
            // 参数说明: 实例, 频道, 消息
            var_dump($msg);
        });

    }

    // 使用 tp5  命令行配置 路由位置
}