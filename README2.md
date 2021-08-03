# getMsg
我的消息推送 

注意备注:
>> 1. Redis 必须安装
>> 2. Subscribe.php 接受对应的频道消息 [注: controller 中的 文件废弃,做参考信息 使用 command 中的 文件类]

>> 在使用 监听消息时, 一定要 启动命令 进行监听 
>> 默认 tp5框架 命令 php /项目文件目录/think subscribe 命令 

>> 消息订阅 ,消息监听 推送 ,简单的redis 实现方式

>> 命名空间 在使用时需要修改