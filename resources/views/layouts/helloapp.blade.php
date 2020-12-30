<!-- p88 laravel入門-->
<html>
<head>
<!--タイトルコンテンツ設定-->
<title>@yield('title')</title>
<style>
    body{font-size:16pt; cotor:#999; margin: 5px;}
    h1{font-size:50pt; text-align:right; color: #161616;
        margin:-20px Opx -30px Opx; letter-spacing:-4pt;}
    ul{font-size:12pt;}
    hr{margin: 25px 100px; border-top: 1px dashed #ddd;} 
    th{background-color:#999; color:#fff; padding:5px 10px;}
    td{border:solid ipx #aaa; color:#999; padding:5px 10px;}
    .menutitle{font-size:14pt; font-weight:bold; margin: Opx;}
    .content{margin:10px;}
    .footer{text-align:right; font-size: 10pt; margin:10px; border-bottom:solid 1px #ccc; color:#ccc;}
</style>
<link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<!--タイトルコンテンツ設定-->
<h1>@yield('title')</h1>
@section('menubar')
<h2 class="menutitle">※メニュー</h2>
<ul>
    <li>@show</li>
</ul>
<hr size="1">
<div class="content">
<!--コンテンツ設定-->
@yield('content')
</div>
<div class="footer">
<!--フッター設定-->
@yield('footer')
</div>
</body>
</html>