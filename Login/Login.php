<?php require_once('Connections/gsgf.php'); ?>
<?php require_once('php/LoginControl.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php 
if(!empty($_SESSION['MM_Username'])){
	header("Location:LoginOK.php");
    exit;
}
?>

<!DOCTYPE html> 

	<html lang="zh-TW"> 
	<head> 
	<script async src=></script> 

	<script> 
	(adsbygoogle = window.adsbygoogle || []).push({ 
	google_ad_client: "ca-pub-4008690824127071", 
	enable_page_level_ads: true 
	}); 
	</script> 
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width initial-scale=1.0, user-scalable=yes"> 
	<title>食在好季</title>

	<meta name="description" content="節氣養生頻道為大家精選了24節氣養生法、季節養生方法等方面的內容，讓大家可以在不同的節氣採取恰當的養生保健方法" /> 
	
	 

	<link rel="profile" href="http://gmpg.org/xfn/11"> 

	<link rel="pingback" href="http://ys.timetw.com/xmlrpc.php"> 

	<!--[if lt IE 9]> 
	<script src="http://ys.timetw.com/wp-content/themes/Ality0.2-zh_TW/js/html5-css3.js"></script> 
	<![endif]--> 
	<!--[if lt IE 7]><script src="http://ys.timetw.com/wp-content/themes/Ality0.2-zh_TW/js/ie6.js" type="text/javascript"></script><![endif]--> 
	<!--[if lt IE 8]><link rel="stylesheet" href="http://ys.timetw.com/wp-content/themes/Ality0.2-zh_TW/css/ie7/ie7.css" /><![endif]--> 
	
	<!--Plugin WP Missed Schedule 2013.1231.2013 Build 2014-09-13 Active - Tag 6707293c0218e2d8b7aa38d418ffa608--> 
	
	<!-- This website is patched against a big problem not solved from WordPress 2.5+ to date --> 
	
	<link rel='stylesheet' id='style-css' href=../css/style2.css>

	<link rel='stylesheet' id='wp-pagenavi-css' href=../css/styleneo/css>
	<script type='text/javascript' src='http://ys.timetw.com/wp-content/themes/Ality0.2-zh_TW/js/jquery.min.js?ver=1.10.1'></script>

	<script type='text/javascript' src='http://ys.timetw.com/wp-content/themes/Ality0.2-zh_TW/js/script.js?ver=1.0'></script>
	<script type='text/javascript' src='http://ys.timetw.com/wp-content/themes/Ality0.2-zh_TW/js/jquery.lazyload.min.js?ver=1.9.3'></script>

	</head> 
	<body class="archive category category-jqys category-2761">
	<header id="header"> 
	<div class="header-clear"><img src="../img/lo.png
                        " alt="Gallery" height = '110'></div> 
	<div class="main-header"> 
	<hgroup class="logo-main"> 

	
	</hgroup> <div id="set-main"> 

	</div> 
	

	</div> 
	</div> 
	</div> </div> 
	<div class="clear"></div> 
    
	<nav id="site-nav" class="main-nav"> 
	<div class="menu-top2-container"><ul id="menu-top2" class="menu">
      <li id="menu-item-61443" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61443"><a href="../index.php">首頁</a></li>
    <li id="menu-item-61442" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61442"><a href="../weather.php">今日天氣</a></li>


    <li id="menu-item-61433" class="menu-item menu-item-type-taxonomy menu-item-object-category current-category-ancestor current-menu-ancestor current-menu-parent current-category-parent menu-item-has-children menu-item-61433"><a href="">時令養生</a>

	<ul class="sub-menu">
	<li id="menu-item-61436" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61436"><a href="../food.php">春季養生</a></li>

	<li id="menu-item-61435" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61435"><a href="../food2.php">夏季養生</a></li>

	<li id="menu-item-61437" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61437"><a href="../food3.php">秋季養生</a></li>

	<li id="menu-item-61434" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61434"><a href="../food4.php">冬季養生</a></li>

	<li id="menu-item-61438" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-61438"><a href="">節氣養生</a></li>

	</ul>
	</li> <li id="menu-item-61433" class="menu-item menu-item-type-taxonomy menu-item-object-category current-category-ancestor current-menu-ancestor current-menu-parent current-category-parent menu-item-has-children menu-item-61433"><a href="../act/act_4.php">活動消息</a><ul class="sub-menu">
	<li id="menu-item-61436" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61436"> <a href="../act_5.php?ACT_type=Movement">運動競賽</a></li>

	<li id="menu-item-61435" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61435"><a href="../act_5.php?ACT_type=Art">藝文活動</a></li>

	<li id="menu-item-61437" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61437"><a href="../act_5.php?ACT_type=Edu">教育活動</a></li>

	<li id="menu-item-61434" class="menu-item menu-item-type-taxonomy menu-item-object-category fmenu-item-61434"><a href="../act_5.php?ACT_type=Out">戶外遊憩</a></li>

	<li id="menu-item-61438" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-61438"><a href="../act_5.php?ACT_type=Family">親子休閒</a></li>
    <li id="menu-item-61438" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-61438"> <a href="../act_5.php?ACT_type=any">其他</a></li>

	</ul>
	</li>
    
  <li id="menu-item-61443" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61443"><a href="LoginOK.php">我的專屬推薦</a></lis></ul></div> <ul><li class="fill"></li>
	</ul></div> <ul><li class="fill"></li></ul> 
	</nav> 
	<!-- #site-nav --> 
	<div class="clear"></div> 
	</header> 
	<!-- #header --> 
	
	<div id="main" class="wrapper"> 
	<div id="search-main"> 
	<div id="searchbar"> 

	<form method="get" id="searchform" action="http://ys.timetw.com/"> 
	<div><input type="text" value="" name="s" id="s" placeholder="輸入搜索內容" required /> 
	<input type="submit" id="searchsubmit" value="搜尋" /> 
	</div> 
	</form> 
	</div> <form action="http://www.baidu.com/baidu" target="_blank"> 

	<input name=word class="swap_value" placeholder="百度站內搜索" required > 
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="百度" /> 
	<input name=tn type=hidden value="bds"> 
	<input name=cl type=hidden value="3"> 
	<input name=ct type=hidden value="2097152"> 
	<input name=si type=hidden value="zmingcx.com"> 
	<input name=si type=hidden value=""> 
	</form> </div> 
	
	<nav class="crumbs">現在位置： <a title="返回首頁" href="">首頁</a> &gt; <a href="" title="">我的專屬推薦</a> &gt; <a href="" title="全部文章">登入</a>  </nav> 
	<div id="primary" class="site-content"> 
	<article id="post-53950" class="post-53950 post type-post status-publish format-standard hentry category-jqys tag-11179 tag-11178 tag-11177 tag-11176 tag-11180"> 
    
    <!--
    ================================================== --> 
     <center><div class="row" style="width:1030px;hight:300px;>

        <!-- Gallery Items
        ================================================== --> 
        
        
        
        
        
        
        
       <section class="content" onMouseOut="this.className='content'" onMouseOver="this.className='content-m'"> 
	 <header class="entry-header"> 
 
	<!-- .entry-header --> 
	<div class="entry-content" style="width:1030px;height:300px;" >
	  </figure> 
    <br><br><br>
	<right><table width="599" height="166" border="1">
  <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
    <tr>
      <td width="234" height="53" align='right' valign="middle">帳號&nbsp:&nbsp&nbsp&nbsp</td>
      <td width="349"><input type="text" name="UserID" id="UserID" placeholder="請輸入帳號" /></td>
    </tr>
    <tr>
      <td height="48" align='right' valign="middle">密碼&nbsp:&nbsp&nbsp&nbsp</td>
      <td><input name="Psd" type="password" id="Psd" lang="en" placeholder="請輸入密碼"/></td>
    </tr>
    <tr>
      <td height="55" colspan="2"><div align="center">
        <p>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="button" onClick="javascript:location.href='register.php'" value="註冊">
          </input>
          &nbsp;&nbsp;&nbsp;
          <input type="submit" name="ok" id="ok" value="登入" />
        </p>
        <p><a href="ForgetPsd.php">忘記密碼?</a></p>
      </div></td>
    </tr>
  </form>
</table></right>
<p>&nbsp;</p>
	
	
	
	
	
	
	
	</div> 
	<!-- .entry-meta --> 
	</div> 
	<!-- .entry-content --> 
	</section> 
	<!-- #content --> 
	 </center>
	

    
</body>
</html>

