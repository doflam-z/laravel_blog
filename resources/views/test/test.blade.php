<html>
<head>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>

<script>
    $(document).ready(function(){

        function anchorClick(link) {
            var linkSplit = link.split('/').pop();
            $.get('/' + linkSplit, function(data) {
                $('.content').html(data);
            });
        }

        $('#container').on('click', 'a', function(e) {
            window.history.pushState(null, null, $(this).attr('href'));
            anchorClick($(this).attr('href'));
            e.preventDefault();
            event.stopPropagation()
        });

        window.addEventListener('popstate', function(e) {
            anchorClick(location.pathname);
        });
    });
</script>

</head>

<body>

<section id='container'>
    <noscript>
        ... ...
    </noscript>

    <ul class="menu">
        <li><a href="/page1">page1</a></li>
        <li><a href="/page2">page2</a></li>
        <li><a href="/page3">page3</a></li>
    </ul>

    <div class="content">
        默认文字
    </div>
</section>

<div>
    <form action="/page1" method="post">
        <input type="text" name="test1post">
        <input type="submit" value="submit">
    </form>
</div>

</body>
</html>
