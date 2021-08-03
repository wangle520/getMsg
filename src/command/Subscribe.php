<?php
namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\addons\Wxeredis;
// 接受消息的command
class Subscribe extends Command
{
    private $redis = null;

    // 配置指令 命令
    // 给php 配置对应的 操作命令
    protected function configure()
    {
        $this->setName('subscribe')->setDescription('命令的备注信息:接收订阅频道的消息');
    }

    protected function execute(Input $input, Output $output){

        $redis = new Wxeredis;
        // $redis->connect('127.0.0.1',6379);
        // $redis->auth(); //密码 认证
        $this->redis = $redis->index();


        // 单个频道 信息 start
        // subscribe 第一个为数组形式 可以订阅多个评到
        // 说明 ['',]
        $this->redis->subscribe(['pubMsg:index'],function($instance,$channel,$msg){
            // 参数说明: 实例, 频道, 消息
            var_dump($msg);
            // 业务逻辑,发送短信,发送邮箱
        });
        // 单个频道 信息 end

        // 多个频道 信息 start
        $this->redis->psubscribe(['pubMsg:*'],function($instance,$rule,$channel,$msg){
            // 参数说明: 实例, 规则, 频道, 消息
            var_dump($msg);
            // 业务逻辑,发送短信,发送邮箱
        });
        // 多个频道 信息 end

        // 备注:重要 测试使用 php ..../think subscribe 命令 启动 
    }


}