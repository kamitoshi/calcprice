<html>
<head>
   <title>@yield('title')</title>
   <style>
   body {font-size:16pt; color:#999; margin: 5px; }
   h1 { font-size:50pt; text-align:right; color:#f6f6f6;
       margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
   ul { font-size:12pt; }
   hr { margin: 25px 100px; border-top: 1px dashed #ddd; }
   .menutitle {font-size:14pt; font-weight:bold; margin: 0px; }
   .content {margin:10px; }
   .main_box {margin:10px; }
   .flex{display:flex;}
   .flex_child {flex:1;}
   .left_content {height:50px;}
   .center_content {height:50px;}
   .right_content {height:50px;}
   .text_center{text-align:center;}
   .footer { text-align:right; font-size:10pt; margin:10px;
       border-bottom:solid 1px #ccc; color:#ccc; }
   </style>
</head>
<body>
    <h1>@yield('title')</h1>
        @section('menubar')
    <h2 class="menutitle">※メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
      @yield('content')
    </div>

    <div class="main_box flex">
      <div class="left_content flex_child">
        @yield('left_content')
      </div>
      <div class="center_content flex_child">
        @yield('center_content')
      </div>
      <div class="right_content flex_child">
        @yield('right_content')
      </div>
    </div>

    <div class="footer">
      copyright 2020 circrest.
    </div>
</body>
</html>