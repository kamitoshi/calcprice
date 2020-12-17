<html>
<head>
   <title>@yield('sub_title')</title>
   <style>
   * {margin:0; padding:0; box-sizing:border-box;}
   body {font-size:16pt; color:#999; }
   header {background-color: #333; color:#fff; width:100%; padding:10px 20px; position:fixed; height:70px;}
   main {padding-top:70px;}
   h1 { font-size:50pt; text-align:right; color:#f6f6f6;
       margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
   ul { font-size:12pt; }
   hr { margin: 25px; border-top: 1px dashed #ddd; }
   .menutitle {font-size:14pt; font-weight:bold; margin: 0px; }
   .container {display:flex;}
   .sidebar{background-color:#333; color:#fff; height:100vh; width:200px; position:fixed;}
   .sidebar a{color:#fff; text-decoration:none; }
   .main_container{margin-left:200px; padding:30px 50px; width:100%;}
   .content {margin:10px; }
   .main_box {margin:10px; }
   .flex{display:flex;}
   .flex_child {flex:1;}
   .text_center{text-align:center;}
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
        <div class="head_conteiner flex">
          <div class="flex_child ma-l-30">
            <h2>@yield('sub_title')</h2>
          </div>
          <div class="flex_child">
            <h1>@yield('title')</h1>
          </div>
        </div>
        <hr size="1">
        <div class="content_box">
          @yield('content')
        </div>
        <hr>
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
      </div>
    </div>  
  </main>
    
  <div class="footer">
    copyright 2020 circrest.
  </div>
</body>
</html>