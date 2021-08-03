<?php
namespace app\addons;

class Wxeredis{
    public function index(){
        $redis = new \redis();
        $redis->connect('127.0.0.1',6379);
        // $redis->auth(); //密码 认证
        // $this->redis = $redis;
        return $redis;
    }
}
