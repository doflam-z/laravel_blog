//解决AJAX浏览器返回功能失效hash方法

/*
//获取指定key的hash值
function getHash(key, url) {
    var hash;
    if (!!url) {
        hash = url.replace(/^.*?[#](.+?)(?:\?.+)?$/, "$1");
        hash = (hash == url) ? "" : hash;
    } else {
        hash = self.location.hash;
    }

    hash = "" + hash;
    hash = hash.replace(/^[?#]/, '');
    hash = "&" + hash;
    var val = hash.match(new RegExp("[\&]" + key + "=([^\&]+)", "i"));
    if (val == null || val.length < 1) {
        return null;
    } else {
        return decodeURIComponent(val[1]);
    }
}
//---------------------------------------------------------------
function loadPanel() {
    var page = getHash("page");
    if (page == null && location.pathname == '/admin') {
        $(".main-content").load("/admin/article");
    }
    if (page == 'article') {
        $(".main-content").load("/admin/article");
    }
    if (page == 'comment') {
        $(".main-content").load("/admin/comment");
    }
    if (page == 'cate') {
        $(".main-content").load("/admin/cate");
    }
    if (page == 'user') {
        $(".main-content").load("/admin/user");
    }
    if (page == 'draft') {
        $(".main-content").load("/admin/draft");
    }
    if (page == 'article') {
        $(".main-content").load("/admin/article");
    }
    if ( page > 0) {
        url= "/article/read?id="+page;
        $.get(url,function(data,status){
            $(".main-content").html(data);
        });
    }
    if (page == 'cate_add') {
        url= "/admin/cate_add";
        $.get(url,function(data,status){
            $(".main-content").html(data);
        });
    }
}
$(window).bind("hashchange", loadPanel);

$(loadPanel);*/

//----------------------------------------以上为hash方法----------------------------------------------------------


/*----------------------------------------以下为History API方法---------------------------------------------------*/
//History API
$(document).ready(function(){

    function anchorClick(link) {
        // var linkSplit = link.split('/').pop();
        $.post(link, {ajax:"1"}, function(data) {
            $('.main-content').html(data);
        });
    }

    $('.ajax').on('click', 'a', function(event) {
        window.history.pushState(null, null, $(this).attr('href'));
        anchorClick($(this).attr('href'));
        event.preventDefault();
        // event.stopPropagation()
    });


    window.addEventListener('popstate', function(e) {
        let url=location.pathname + location.search;
        anchorClick(url);
    });


    stop_ajax = function(){
        $(".ajax").off("click","a");
    }
    /*
        page_url= function(url) {
            window.history.pushState(null, null, url);
            anchorClick(url);
        };
    */
});

/*----------------------------------------以上为History API方法---------------------------------------------------*/

//加载页面公共部分
$(document).ready(function () {
    $(".info").load("/info");
    $(".article_list").load("/list");

    let url=location.pathname + location.search;
    if (url != '/admin/search') {
        $.post(url, {ajax: "1"}, function (data) {
            $(".main-content").html(data);
        })
    }
})

//-----------------以上是自动加载部分-----------

function p_del() {
    var msg = "确定要删除吗？";
    if (confirm(msg)==true){
        return true;
    }else{
        return false;
    }
}

/*//ajax分页
function setPage(url) {
    // let link = url.split('?').pop();
    $.post(url,{ajax:"1"},function(data){
        $('.main-content').html(data);
    });
}
// setPage('/admin/article?page=1');*/

//---------------------------------------------


