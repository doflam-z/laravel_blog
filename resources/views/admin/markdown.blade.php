<!DOCTYPE html>
<html>
<header>
    <title>写文章</title>
    <link rel="stylesheet" href="/editormd/css/editormd.css" />
    <link rel="stylesheet" type="text/css" href="/css/font.css">
    <style type="text/css">
        body{
            margin: 0px;
            padding: 0px;
        }
        .button{
            border-radius: 6px;
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 6px 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;/*添加按钮hover*/
        }
        .button1{
            /*box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);*/
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            background: #0d96dc;
        }
        .button1:hover{
            /*box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);*/
            background-color: #084f73;
        }
        .button2{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);/*添加按钮阴影*/
            background: #87a4b3;
        }
        .button2:hover{
            background: #44555f;
        }
        #nav a{
            color: #87a4b3;
            text-decoration: none;
        }
        #nav a:hover{
            color: #0d96dc;
        }
    </style>
</header>
<body>
<form action="/article/add" method="POST">
    <div id="nav" style="height: 40px">
        <span style="line-height: 40px;position: relative;left: 20px;color: #57555f;"><a  href="/admin">返回管理</a>&nbsp;&nbsp;&nbsp;标题<span class="icon-arrow-right"></span>
            <input style="width:1500px;height:30px;border-radius: 6px;font-size: 18px;" type="text" name="article_title" value="{{$article_title}}">
            <input type="hidden" name="id" value="{{$id}}">
            <button class="button button1" type="submit" name="publish" value="{{$sub}}">发布文章</button>
            <button class="button button2" type="submit" name="save" value="save">保存</button>
            <select name="category" style="color: #0e0e0e;padding: 2px 4px;border-radius: 6px">
                @foreach($cate_list as $value)
                   <option  value='{{$value->cate_name}}'>{{$value->cate_name}}</option>
                @endforeach
            </select>
        </span>
    </div>
    <div id="test-editor">
        <textarea style="display:none;" name="mark">{{$article_content}}</textarea>
        <textarea class="editormd-html-textarea" name="post"></textarea>
    </div>
</form>
    <script src="https://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="/editormd/editormd.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var editor = editormd("test-editor", {
                width  : "100%",
                height : "840",
                path   : "/editormd/lib/",
                saveHTMLToTextarea : true  //该选项必须开启才能获取到html语言
            });
        });
    </script>
</body>
</html>
