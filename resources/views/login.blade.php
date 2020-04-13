<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/editormd/css/editormd.css" />
    <link href="/css/blog_admin.css" rel="stylesheet" type="text/css" />

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <title>login</title>
</head>
<style>
    *{margin: 0;padding: 0;}
    body,html{width: 100%;height: 100%;background-color: #fff}
    .login button{background-color: #313131;border-color: #313131;}
</style>
<body>
<div class="container-fluid" style="position: relative;height: 100%">
    <div class="row justify-content-center align-items-center" style="height: 100%;">
        <div class="login col-auto border rounded">
        <form action="/ver" method="post">
            <h3 class="row" style="background-color: #313131;padding: 20px;color: #fff;">Login</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">User name</label>
                <input type="text" name="user_name" class="form-control" placeholder="Enter user">
{{--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="user_passwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
{{--            <div class="form-check">--}}
{{--                <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary">Submit</button>
                {{--传输token--}}
{{--            {{csrf_field()}}--}}
        </form>
        </div>
    </div>
</div>
</body>
</html>
