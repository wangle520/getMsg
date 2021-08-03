<?php
 
namespace app\index\controller;
use app\addons\Wxeredis;

// 发布消息方法
class Publish{
    private $redis = null;

    public function __construct(){
        $redis = new Wxeredis;
        // $redis->connect('127.0.0.1',6379);
        // $redis->auth(); //密码 认证
        $this->redis = $redis->index();
    }

    public function index(){
        //定义一个频道,频道当中发布消息使用 返回发送接受这条消息的人的信息
        $ret = $this->redis->publish('pubMsg:index','我得到了这个频道消息'); 
        if($ret > 0 ){
            // 接受消息的人数
            var_dump('能接受的人sum:'. $ret);
        }
        return '发布消息';
    }

    public function api(){
        //定义一个频道,频道当中发布消息使用 返回发送接受这条消息的人的信息
        $ret = $this->redis->publish('pubMsg:api','我得到了这个频道消息api'); 
        if($ret > 0 ){
            // 接受消息的人数
            var_dump('能接受的人apisum:'. $ret);
        }
        return '发布消息';
    }

 }
