<?php

function format($time) {
    $rtime=date("m-d H:i",$time);
    $htime=date("H:i",$time);
    $time=time() - $time;
    if ($time <60) {
        $str='60s';
    }
    elseif ($time <60 * 60) {
        $min=floor($time/60);
        $str=$min.' minutes ago';
    }
    elseif ($time <60 * 60 * 24) {
        $h=floor($time/(60*60));
        $str=$h.' hours ago  ';
    }
    elseif ($time <60 * 60 * 24 * 3) {
        $d=floor($time/(60*60*24));
        if($d==1)
            $str='yesterday ';
        else
            $str='before yesterday ';
    }
    else {
        $str=$rtime;
    }
    return $str;
}

class Page {
    private $total;      //总记录
    private $pagesize;    //每页显示多少条
    private $limit;          //limit
    private $page;           //当前页码
    private $pagenum;      //总页码
    private $url;           //地址
    private $bothnum;      //两边保持数字分页的量

    //构造方法初始化
    public function __construct($_total, $_pagesize) {
        $this->total = $_total ? $_total : 1;
        $this->pagesize = $_pagesize;
        $this->pagenum = ceil($this->total / $this->pagesize);
        $this->page = $this->setPage();
        $this->limit = "LIMIT ".($this->page-1)*$this->pagesize.",$this->pagesize";
        $this->url = $this->setUrl();
        $this->bothnum = 2;
    }

    //拦截器
    public function __get($_key) {
        return $this->$_key;
    }

    //获取当前页码
    private function setPage() {
        if (!empty($_GET['page'])) {
            if ($_GET['page'] > 0) {
                if ($_GET['page'] > $this->pagenum) {
                    return $this->pagenum;
                } else {
                    return $_GET['page'];
                }
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    //获取地址
    private function setUrl() {
        $_url = $_SERVER["REQUEST_URI"];
        $_par = parse_url($_url);
        if (isset($_par['query'])) {
            parse_str($_par['query'],$_query);
            unset($_query['page']);
            $_url = $_par['path'].'?'.http_build_query($_query);
        }else{
            $_url .='?';
        }
        return $_url;
    }
    //数字目录
    private function pageList() {

        $_pagelist="";
        for ($i=$this->bothnum;$i>=1;$i--) {
            $_page = $this->page-$i;
            if ($_page < 1) continue;
            $_pagelist .= '<li><a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a></li>';
        }
        $_pagelist .= '<li class="active"><span class="me">'.$this->page.'</span></li>';
        for ($i=1;$i<=$this->bothnum;$i++) {
            $_page = $this->page+$i;
            if ($_page > $this->pagenum) break;
            $_pagelist .= '<li><a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a></li>';
        }
        return $_pagelist;
    }

    //首页
    private function first() {
        if ($this->page > $this->bothnum+1) {
            return '<li><a href="'.$this->url.'">1</a> ...</li>';
        }
    }

    //上一页
    private function prev() {
        if ($this->page == 1) {
            return '<li class="disabled"><span>prev</span></li>';
        }
        return '<li><a href="'.$this->url.'&page='.($this->page-1).'">prev</a></li>';
    }

    //下一页
    private function next() {
        if ($this->page == $this->pagenum) {
            return '<li class="disabled"><span>next</span></li>';
        }
        return '<li><a href="'.$this->url.'&page='.($this->page+1).'">next</a></li>';
    }

    //尾页
    private function last() {
        if ($this->pagenum - $this->page > $this->bothnum) {
            return '<li>...<a href="'.$this->url.'&page='.$this->pagenum.'">'.$this->pagenum.'</a></li>';
        }
    }

    //分页信息
    public function showpage() {
        $_page ='';
        $_page .= $this->prev();
        $_page .= $this->first();
        $_page .= $this->pageList();
        $_page .= $this->last();
        $_page .= $this->next();
        return $_page;
    }
}