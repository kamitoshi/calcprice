<html>
<head>
   <title>@yield('title')</title>
   <style>
   * {margin:0; padding:0; box-sizing:border-box;}
   body {font-size:16pt; color:#999; }
   header {background-color: #333; color:#fff; width:100%; padding:10px 20px;}
   h1 { font-size:50pt; text-align:right; color:#f6f6f6;
       margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
   ul { font-size:12pt; }
   hr { margin: 25px; border-top: 1px dashed #ddd; }
   .menutitle {font-size:14pt; font-weight:bold; margin: 0px; }
   .container {display:flex;}
   .sidebar{flex:1; background-color:#333; color:#fff; height:100vh;}
   .sidebar a{color:#fff;}
   .main_container{flex:6; padding:30px 50px;}
   .content {margin:10px; }
   .flex{display:flex;}
   .flex_child {flex:1;}
   .flex_between{display:flex; justify-content:space-between;}
   .submit_btn{text-align: center; margin:50px;}
   .btn{height:50px; width:150px;}
   .footer { text-align:right; font-size:10pt; margin:10px;
       border-bottom:solid 1px #ccc; color:#ccc; }
   </style>
</head>
<body>
    <header>
        <h2 class="title">CalcPrice</h2>
    </header>
    <main>
        <div class="container">
            <div class="sidebar">
                @include("components.sidebar")
            </div>
            <div class="main_container">
                @yield("main_container")
            </div>
        </div>
        
    </main>
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
    <div class="footer">
        copyright 2020 circrest.
    </div>
</body>
</html>