Yaf-test
========
假设熟悉yaf；
0.yaf扩展请升级到最新稳定版本(2.2.9).
1.程序配置文件在/conf/application.ini 中， 修改相关配置。配置 数据库，Smarty模板等。 
2.Zend类库作为Yaf 的全局类使用要把zend包放到php的include_path 目录中，可以配置php.ini 或者在代码中重新设置include_path;
3.Smarty 作为yaf 的本地类使用，放在/application/library/Smarty 中，也可以把Smarty作为全局类使用，但是要调整一下代码。 
4.nginx 配置文件: yaf-nginx.conf.
