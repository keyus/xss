<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <title>tutu</title>
    <link rel="stylesheet" href="/asset/common.css" />
</head>
<body>
<form id="signform">
    <input type="text" name="us">
    <input type="password" name="pd">
    <input type="submit" value="sign in">
    <span id="progess"></span>
</form>
<span style="color: #ff0000;display: none" id="error">user or password error</span>
</body>
<script>
    var doc=document,
        form=doc.querySelector('#signform');
    us=form.us,
        pd=form.pd,
        error=doc.querySelector('#error'),
        progess=doc.querySelector('#progess');

    form.addEventListener('submit',function (e) {
        e.preventDefault();
        var value={
            us:us.value.trim(),
            pd:pd.value.trim()
        }
        if(value.us && value.pd){
            var data='us='+value.us+'&pd='+value.pd;
            var xhr=new XMLHttpRequest;
            progess.innerHTML='正在登录...';
            xhr.onreadystatechange=function () {
                if (xhr.readyState==4){
                    var res=JSON.parse(xhr.responseText)
                    if(res.success){
                        progess.innerHTML='登陆成功,跳转中...';
                        error.style.display='none';
                        setTimeout(function(){
                            location.href='web.php';
                        },1000)
                    }else{
                        progess.innerHTML='';
                        error.style.display='block';
                    }
                }
            }
            xhr.open("POST",'auth.php',true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send(data)
        }
    },false)

</script>
</html>