<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<p>
<?php
	$nowDate = strtotime(date("Y-m-d h:i:s"));
	$cold_dew = strtotime("2017-10-08 10:22:00");				//寒露
	$Frost_descent = strtotime("2017-10-23 13:27:00");			//霜降
	$beginning_of_winter = strtotime("2017-11-07 13:38:00");	//立冬
	$Slight_Snow = strtotime("2017-11-22 11:05:00");			//小雪
	$Great_Snow = strtotime("2017-12-07 06:33:00");				//大雪
	$the_Winter_Solstice = strtotime("2017-12-22 00:28:00");	//冬至
	$Slight_Cold = strtotime("2018-1-05 11:56:00");				//小寒
	$Great_Cold = strtotime("2018-1-20 05:24:00");				//大寒
	$Beginning_of_Spring = strtotime("2018-2-03 23:34:00");		//立春
	$Rain_Water = strtotime("2018-2-18 19:31:00");				//雨水
	$Waking_of_Insects = strtotime("2019-3-05 17:33:00");		//驚蟄
	$Spring_Equinox = strtotime("2019-3-23 18:29:00");			//春分
	$now_solar_terms;											//現在節氣
	if($cold_dew <= $nowDate && $nowDate < $Frost_descent){
		echo "寒露";
		$now_solar_terms = "寒露";
	} else if($Frost_descent <= $nowDate && $nowDate < $beginning_of_winter) {
		$now_solar_terms = "霜降";
	} else if($beginning_of_winter <= $nowDate && $nowDate < $Slight_Snow) {
		$now_solar_terms = "立冬";
	} else if($Slight_Snow <= $nowDate && $nowDate < $Great_Snow) {
		$now_solar_terms = "小雪";
	} else if($Great_Snow <= $nowDate && $nowDate < $the_Winter_Solstice) {
		$now_solar_terms = "大雪";
	} else if($the_Winter_Solstice <= $nowDate && $nowDate < $Slight_Cold) {
		$now_solar_terms = "冬至";
	} else if($Slight_Cold <= $nowDate && $nowDate < $Great_Cold) {
		$now_solar_terms = "小寒";
	} else if($Great_Cold <= $nowDate && $nowDate < $Beginning_of_Spring) {
		$now_solar_terms = "大寒";
	} else if($Beginning_of_Spring <= $nowDate && $nowDate < $Rain_Water) {
		$now_solar_terms = "立春";
	} else if($Rain_Water <= $nowDate && $nowDate < $Waking_of_Insects) {
    	$now_solar_terms = "雨水";
	} else if($Waking_of_Insects <= $nowDate && $nowDate < $Spring_Equinox) {
    	$now_solar_terms = "驚蟄";
	} else if($Spring_Equinox <= $nowDat) {
		$now_solar_terms = "春分";
	} else {
		$now_solar_terms = "春分";
	}
/*    } else if() {
    } else if() {
    } else if() { 
	echo $nowDate;
	echo "<p>&nbsp;</p>";
	echo $beginning_of_winter;
	echo "<p>&nbsp;</p>";
	echo (int)(($beginning_of_winter-$nowDate)/86400);
	echo "<p>&nbsp;</p>"; */
	?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>