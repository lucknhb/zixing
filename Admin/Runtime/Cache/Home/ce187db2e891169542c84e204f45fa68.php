<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <title>自兴人工智能学院管理后台登录</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/login.css" />
    <script type="text/javascript" src="/Public/Js/jQuery1.7.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery1.42.min.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.SuperSlide.js"></script>
    <script type="text/javascript" src="/Public/Js/Validform_v5.3.2_min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
	  var $tab_li = $('#tab ul li');
	  $tab_li.hover(function(){
		  $(this).addClass('selected').siblings().removeClass('selected');
		  var index = $tab_li.index(this);
		  $('div.tab_box > div').eq(login).show().siblings().hide();
	  });
     });
    </script>

<script type="text/javascript">
$(function(){
	$(".screenbg ul li").each(function(){
		$(this).css("opacity","0");
	});
	$(".screenbg ul li:first").css("opacity","1");
	var index = 0;
	var t;
	var li = $(".screenbg ul li");
	var number = li.size();
	function change(index){
		li.css("visibility","visible");
		li.eq(login).siblings().animate({opacity:0},3000);
		li.eq(login).animate({opacity:1},3000);
	}
	function show(){
		login = login + 1;
		if(login <= number-1){
			change(login);
		}else{
			login = 0;
			change(login);
		}
	}
	t = setInterval(show,8000);
	//根据窗口宽度生成图片宽度
	var width = $(window).width();
	$(".screenbg ul img").css("width",width+"px");
});
</script>
</head>
<body>
<div id="tab">
  <ul class="tab_menu">
    <li class="selected">管理员登录</li>
  </ul>
  <div class="tab_box"> 
    <!-- 登录 -->
    <div>
      <form method="post" id="submit_form">
        <div id="username">
          <label>手机号：</label>
          <input type="text" id="admin_username_hide" name="username" placeholder="请输入工号" />

        </div>
        <label id="username_lable"></label>
        <div id="password">
          <label>密&nbsp;&nbsp;&nbsp;码：</label>
          <input type="password" id="admin_password_hide" name="password" placeholder="请输入密码"/>
        </div>
        <div id="code">
          <label>验证码：</label>
          <input type="text" id="admin_code_hide" name="code"  placeholder="请输入验证码" />
          <!--验证码区域-->
          <img id="img_verify" src="/admin.php/Home/Login/verify" title="点击刷新" alt="验证码图"/>
        </div>
        <div id="remember">
          <input type="checkbox" name="remeber" style="width: 15px;height: 15px">
          <label>记住密码</label>
        </div>
        <div id="login">
          <button type="submit" onclick="check()">登录</button>
        </div>
      </form>
    </div>
   <!-- 登录结束-->
  </div>
</div>
<div class="bottom">©2017   海冰科技</div>
<div class="screenbg">
  <ul>
    <li><a href="javascript:;"><img src="/Public/Images/1.jpg"></a></li>
    <li><a href="javascript:;"><img src="/Public/Images/2.jpg"></a></li>
  </ul>
</div>
</body>
</html>
<script>
    var img = $('#code').find('img')
    var verify_img = img.attr("src");
    img.attr('title', '点击刷新');
    img.click(function(){
        if( verify_img.indexOf('?')>0){
            $(this).attr("src", verify_img+'&random='+Math.random());
        }else{
            $(this).attr("src", verify_img.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });
</script>


<script type="text/javascript">
  function check() {
      var username = $("#admin_username_hide").val();
      var password = $("#admin_password_hide").val();
      var code = $("#admin_code_hide").val();
      if(username==''){
          alert("请输入工号");
      }else if(password==''){
          alert("密码不能为空");
      }else if(code==''){
          alert("验证码不能为空");
      }else{
          document.getElementById("submit_form").action="/admin.php/Home/Admin/index";
      }
  }
</script>