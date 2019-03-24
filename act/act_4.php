<?php

session_start();
require("dbconnect.php");
$sql = "SELECT * FROM `act`";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
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
	
	<link rel='stylesheet' id='style-css' href='css/style6.css'/>
	
	
	</head> 
	<body class="archive category category-jqys category-2761">
	<header id="header"> 
	<div class="header-clear"><a href="../index.php"><img src="../img/lo.png
                        " alt="Gallery"height = '110'></a> 
                        </div> <div class="main-header"> 
	<hgroup class="logo-main"> 

	
	</hgroup> <div id="set-main"> 
<?php include_once('../Login/User.php'); //登入欄位?>
	</div> 
	  
	

	</div> 
	</div> </div> 
	<div class="clear"></div> 
    
	<nav id="site-nav" class="main-nav"> 
	<div class="menu-top2-container"><ul id="menu-top2" class="menu">
       <li id="menu-item-61443" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61443"><a href="../index.php">首頁</a></li>
    <li id="menu-item-61442" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61442"><a href="../weather.php">氣象物候</a></li>

    <li id="menu-item-61433" class="menu-item menu-item-type-taxonomy menu-item-object-category current-category-ancestor current-menu-ancestor current-menu-parent current-category-parent menu-item-has-children menu-item-61433"><a href="../food4.php">時令養生</a>

	<ul class="sub-menu">
	<li id="menu-item-61436" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61436"><a href="../food.php">春季養生</a></li>

	<li id="menu-item-61435" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61435"><a href="../food2.php">夏季養生</a></li>

	<li id="menu-item-61437" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61437"><a href="../food3.php">秋季養生</a></li>

	<li id="menu-item-61434" class="menu-item menu-item-type-taxonomy menu-item-object-category fmenu-item-61434"><a href="../food4.php">冬季養生</a></li>

	<li id="menu-item-61438" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-61438"><a href="">節氣養生</a></li>

	</ul>
	</li> <li id="menu-item-61433" class="menu-item menu-item-type-taxonomy menu-item-object-category current-category-ancestor current-menu-ancestor current-menu-parent current-category-parent menu-item-has-children menu-item-61433"><a href="act_4.php">活動消息</a>

	<ul class="sub-menu">
	<li id="menu-item-61436" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61436"> <a href="act_5.php?ACT_type=Movement">運動競賽</a></li>

	<li id="menu-item-61435" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61435"><a href="act_5.php?ACT_type=Art">藝文活動</a></li>

	<li id="menu-item-61437" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61437"><a href="act_5.php?ACT_type=Edu">教育活動</a></li>

	<li id="menu-item-61434" class="menu-item menu-item-type-taxonomy menu-item-object-category fmenu-item-61434"><a href="act_5.php?ACT_type=Out">戶外遊憩</a></li>

	<li id="menu-item-61438" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-61438"><a href="act_5.php?ACT_type=Family">親子休閒</a></li>
    <li id="menu-item-61438" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-61438"> <a href="act_5.php?ACT_type=any">其他</a></li>

	</ul>
	</li>

	<li id="menu-item-61443" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-61443"><a href="../Login/Login.php">我的專屬推薦</a></li>

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
	
	<nav class="crumbs">現在位置： <a title="返回首頁" href="http://ys.timetw.com">首頁</a> &gt; <a href="http://ys.timetw.com/category/season" title="觀看分類「時令養生」的全部文章">所有活動</a> </nav> 
	<div id="primary" class="site-content"> 
	<article id="post-53950" class="post-53950 post type-post status-publish format-standard hentry category-jqys tag-11179 tag-11178 tag-11177 tag-11176 tag-11180"> 
    <!--
    =============================================
    -->
	
    
	<div class="title-heavy"></div> 
	<!--<h1 class="entry-title"><a href="" rel="bookmark" title="詳細閱讀 立秋">全部活動</a></h1> -->

	<!-- .entry-header --> 
	<div class="entry-content"> 
	<figure class="thumbnail"> 
	<!-- <a href="recipe/13the Beginning of Autumn.html"><img src="img/Section/13.jpg
                        " alt="Gallery"></a> -->
	</a> 
	</figure> 

	<div class="entry-site"> 
	
	
	<?php
            $i='ACT_id';
            $ACT_web='ACT_web';
            $ACT_CDTdata='ACT_CDTdata';
            echo"<link rel=\"stylesheet\" id=\"style-css\" href=\"css/style.css\" />";
            $nowDate = strtotime(date("Y-m-d"));
                
            while ( $rs=mysqli_fetch_assoc($result)) { 
                $ACT_CDTdata='ACT_CDTdate';
                $ActDate = strtotime($rs['ACT_CDTdata']);
                $a=(int)(($ActDate-$nowDate)/86400);
                
?>
                <section class='content' onMouseOut='this.className='content'' onMouseOver='this.className='content-m''>
             <header class="entry-header">	
             <div class="title-heavy"></div> 
             </header> 
                <table><tr><td COLSPAN='3' ROWSPAN='4'><figure class="thumbnail"> <?php echo $rs['ACT_photo']?> width='140t'></figure></td>
                 
                <td  COLSPAN='8' span style='font-size:15pt;'><a href ="Count.php?actID=<?php echo $rs['ACT_id']?>"><?php echo $rs['ACT_name']?></a></td> 
 
                <td COLSPAN='2' align='right' span style='color:#359768;font-size:15pt;'><B>活動倒數 : <?php echo $a?></B></td> </tr>
                
                <tr ><td colspan='5'>活動日期: <?php echo $rs['ACT_date']?> </td>
                <td colspan='5' align="right"><img src='photo/Place.png' alt='' width=anto height='15'/><?php echo $rs['ACT_place']?></td>
                <tr ><td colspan='10'>報名日期: <?php echo $rs['ACT_regtime']?></td></tr>
                
                <tr><td colspan='10' style="border:2px #e0e0d1  solid;"><?php echo $rs['ACT_content']?></td></tr>
                
                <!--<tr><td colspan='2'>詳細內容</td>-->
                <td colspan='4'><?php echo $rs['ACT_type']?></td>
                <td colspan='3'><?php echo $rs['ACT_toll']?></td></tr>
                 
                </table></section>
 <?php              

            }
        ?>
        
	<div class="clear"></div> 
	</div> 
    </table >
	<div class="clear"></div> 
	<div class="entry-meta"> 
	<span class="meta-site"> 
	
	
	</div> 
	<!-- .entry-meta --> 
	</div> 
	<!-- .entry-content --> 
	</section> 
	<!-- #content --> 
	</article> 
	
	<!--
    =============================================
    -->

	

    


	<!-- #content --> 
	</article> 

    
	<!-- .entry-header --> 
    
    
    <!--
    =============================================
    -->
    
    
	<nav id="pagenavi"><div id="pagenavi">
	<span class='page-numbers current'>1</span><a class='page-numbers' href='' title='下頁'>下頁</a></div>
	</nav> 
	</div> 
	<!-- #primary --> 
	<div id="sidebar" class="widget-area"> 

	
	
   <script type='text/javascript'>
	/* <![CDATA[ */
	var dropdown = document.getElementById("cat");
	function onCatChange() {
	if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
	location.href = "http://ys.timetw.com/?cat="+dropdown.options[dropdown.selectedIndex].value;
	}
	}
	dropdown.onchange = onCatChange;
	/* ]]> */
	</script>
	
		<div class="clear"></div></aside><aside id="text-3" class="widget widget_text"><h3 class="widget-title"><p><i class="icon-st"></i></p>埔里現在的空氣污染</h3> <div class="textwidget">
 <?php include_once('../pm2_5.php'); ?>
 <P><a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../img/11.png
                        " alt="Gallery"></a></P>
	</a> 
	</script></div>
	<div class="clear"></div></aside><aside id="hot_post-3" class="widget widget_hot_post"><h3 class="widget-title"><p><i class="icon-st"></i></p>熱門食譜</h3>
	<div id="hot_post_widget">
	<ul>
	
	<?php
	$sql="Select * From act order by Count desc";
	$result = mysql_query($sql,$gsgf) or die("run error");
	$i = 0;
	while($row = mysql_fetch_array($result)){
		echo "<li><a href='";
		//!!!!!!!!!!!!!!!!網址記得改!!!!!!!!!!!!!!!!!!
		
		echo "Count.php?actID=".$row['ACT_id'];
		//!!!!!!!!!!!!!!!!網址記得改!!!!!!!!!!!!!!!!!
		echo "'>";
		echo $row['ACT_name'];
		echo "</a>";
		echo "<br />";
		$i = $i+1;
		if($i == 10){
			break;
		}
			
	}
	?>
    </ul>
	</div>
	<script type="text/javascript">
	function setSN(e){
	var ul = document.getElementById(e);
	var lis= ul.getElementsByTagName('li');
	for(var i=0,l=lis.length;i<3;i++){
	var tHTML = lis[i].innerHTML
	lis[i].innerHTML = '<span id="li-icon" class="ago-icon">'+(i+1)+'</span>'+tHTML;
	}
	for(var i=3,l=lis.length;i<l;i++){
	var tHTML = lis[i].innerHTML
	lis[i].innerHTML = '<span id="li-icon" class="after-icon">'+(i+1)+'</span>'+tHTML;
	}
	}
	setSN('hot_post_widget');
	</script>
	
    
	<div class="clear"></div></aside><aside id="text-7" class="widget widget_text"> <div class="textwidget"><script type="text/javascript"> 
	google_ad_client = "ca-pub-4008690824127071"; 
	google_ad_slot = "1000652307"; 
	google_ad_width = 300; 
	google_ad_height = 600; 
	</script> 
	<!-- mmtw300x600 --> 
	<script type="text/javascript" 
	src="//pagead2.googlesyndication.com/pagead/show_ads.js"> 

	</script></div>
	
	
	<div class="clear"></div></aside> </div> 
	<div class="clear"></div> 

	<footer id="footer"> 
	<div class="site-info"> 
	good_season_good_food &copy; 
	</div> <!-- .site-info --> 
	<div id="sidr" style="display: none;"><a id="simple-menu-s" href="#sidr"><i class="icon-close"></i></a><ul><li><a href="http://ys.timetw.com/wp-admin/nav-menus.php">點此設置菜單</a></li></ul></div> 
	
	<div id="login"> 

	<h1>用戶登錄</h1> 
	<form action="http://ys.timetw.com/wp-login.php?redirect_to=http%3A%2F%2Fys.timetw.com%2F53950.html" method="post" id="loginform"> 
	<fieldset id="inputs"> 
	<input id="username" type="text" name="log" id="log" placeholder="名稱" required> 
	<input id="password" type="password" name="pwd" id="pwd" placeholder="密碼" required> 
	</fieldset> 
	<fieldset id="actions"> 
	<input type="submit" id="submit" value="登錄"> 
	<input type="hidden" name="redirect_to" value="/category/season/jqys" /> 
	<label><input type="checkbox" name="rememberme" id="modlogn_remember" value="yes" checked="checked" alt="Remember Me" >記住登錄信息</label> 
	</fieldset> 
	</form> 
	</div> 
	<ul id="scroll"> 

	<li><a class="scroll_t" title="返回頂部"><i class="icon-scroll_t"></i></a></li> 
	
	<li><a class="scroll_b" title="轉到底部"><i class="icon-scroll_b"></i></a></li> 
	</ul> 
	
	</footer> 
	<!-- #footer --> 
	</div><!-- #main --> 
	</div><!-- #page --> 
	
    
    
	
	<!--Plugin WP Missed Schedule 2013.1231.2013 Build 2014-09-13 Active - Tag 6707293c0218e2d8b7aa38d418ffa608--> 
	
	<!-- This website is patched against a big problem not solved from WordPress 2.5+ to date --> 
	

	</body> 
	</html>


	</script> 
	
	<!--Plugin WP Missed Schedule 2013.1231.2013 Build 2014-09-13 Active - Tag 6707293c0218e2d8b7aa38d418ffa608--> 
	
	<!-- This website is patched against a big problem not solved from WordPress 2.5+ to date --> 
	
	
	</body> 
	</html>

