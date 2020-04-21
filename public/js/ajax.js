//解决AJAX浏览器返回功能失效问题

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
    if (page == 1) {
        $(".main-content").load("/admin/article");
    }
    if (page == 2) {
        $(".main-content").load("/admin/comment");
    }
    if (page == 3) {
        $(".main-content").load("/admin/cate");
    }
    if (page == 4) {
        $(".main-content").load("/admin/user");
    }
    if (page == 5) {
        $(".main-content").load("/admin/draft");
    }
    if (page == 6) {
        $(".main-content").load("/admin/article");
    }
    if (page > 10) {
        url= "/article/read?id="+page;
        $.get(url,function(data,status){
            $(".main-content").html(data);
        });
    }
}
$(window).bind("hashchange", loadPanel);

$(loadPanel);
