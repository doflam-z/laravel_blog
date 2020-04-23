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

//----------------------------------------以下为History API方法---------------------------------------------------


