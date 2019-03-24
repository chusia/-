<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--===================JS==========================-->
<script src="js/jquery-3.2.1.js"></script>
<!--===================JS==========================-->
</head>
<body>
<?php 
if(isset($_SESSION['MM_Username'])){
	$AQI_UID = $_SESSION['MM_Username'];
	$sql = "SELECT Allergy FROM `user` where UserID = '$AQI_UID'";
	$Res = mysql_query($sql, $gsgf) or die("run errer");
	$The_Res = mysql_fetch_array($Res);
	if($The_Res['Allergy'] == 'Y'){
?>
<div class = "pm2_5"></div>
<script>
	//$('input[name=loading]').click(
		function pm2_5(){
			//var send = {'username':$('#UID').val()}
			var url = 'https://api.waqi.info/feed/@1656/?token=2716622fc5a07931a5e8c65dc73275ed8e0aa784'
			$.ajax({
				url:url,
				type:'GET',
				//timeout:5000,
				//data:send,
				dataType: "json",
				success:function(data){
					//console.log(data);
					//alert('123');
					//alert(data.feeds[0].date);
					/*var i;
					for(i = 1;i<=1000;i++){
						var a = data.feeds[i].SiteEngName;
						if(a =='Puli'){
							break;
						}
						
					}*/
					console.log(data);
					
					//============
					var send = {'AQI':data.data.aqi}//要送的資料(json)
					var url = 'AQI.php'//要送的網址
					$.get(url,send);//送到aqi存進session
					//============
					if(data.data.aqi<51){
						var color = '1.png';//綠
						var font_color = 'black';
						var keigoku = '空氣品質為良好';
						var remind = '今天空氣品質不錯，&#10;多出門走走吧';
					} else if (data.data.aqi>=51 && data.data.aqi<101){
						var color = '2.png';
						var font_color = 'black';
						var keigoku = '空氣品質為普通<br>對少數敏感族群有輕微影響';
						var remind = '今天空氣品質還不錯，&#10;但出門時還是要小心可能有&#10;較輕微的咳嗽或呼吸急促症狀';
					} else if (data.data.aqi>=101 && data.data.aqi<151){
						var color = '3.png';
						var font_color = 'black';
						var keigoku = '對敏感族群不健康<br>建議敏感族群出門可戴上口罩';
						var remind = '今天空氣品質不太好，&#10;提醒敏感族群的您減少在戶外劇烈活動；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					} else if (data.data.aqi>=151 && data.data.aqi<201){
						var color = '4.png';//紅色
						var font_color = 'white';
						var keigoku = '對所有族群不健康<br>建議民眾減少室外活動，&#10;必要時戴上口罩出門';
						var remind = '今天空氣品質不好，&#10;提醒敏感族群的您避免在戶外活動；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					} else if (data.data.aqi>=201 && data.data.aqi<301){
						var color = '5.png';//紫色
						var font_color = 'white';
						var keigoku = '非常不健康<br>有人都可能產生較嚴重的健康影響';
						var remind = '今天空氣品質很不好，&#10;提醒敏感族群的您避免在戶外活動；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					} else {
						var color = '6.png';//褐色
						var font_color = 'white';
						var keigoku = '危害<br>健康威脅達到緊急，所有人都可能受到影響';
						var remind = '今天空氣品質很糟糕，&#10;提醒敏感族群的您若沒要事別出門；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					}
						
					
					//============html================
					$('.pm2_5').html('<table><tr><td width="95" height = "50" rowspan="3"><img src = "/good_season_good_food/img/pm/'+color+'" width = "85" title = "'+remind+'"></td><td>AQI：'+data.data.aqi+'</td><td></td></tr><tr><td width="174"rowspan="2">'+keigoku+'</td><td width="1"></td></tr><tr><td></td></tr><tr><td colspan="2"><font size="1">　更新時間:'+data.data.time.s+'</font></td><td></td></tr></table>');
					//============html================
				},//1656埔里1621南投
				error: function(jqXHR) {
                    console.log(jqXHR);
				}
			});
		}
//	);
pm2_5();
</script>
<?php 
	} else {
?>
<div class = "pm2_5"></div>
<script>
	//$('input[name=loading]').click(
		function pm2_5(){
			//var send = {'username':$('#UID').val()}
			var url = 'https://api.waqi.info/feed/@1656/?token=2716622fc5a07931a5e8c65dc73275ed8e0aa784'
			$.ajax({
				url:url,
				type:'GET',
				//timeout:5000,
				//data:send,
				dataType: "json",
				success:function(data){
					//console.log(data);
					//alert('123');
					//alert(data.feeds[0].date);
					/*var i;
					for(i = 1;i<=1000;i++){
						var a = data.feeds[i].SiteEngName;
						if(a =='Puli'){
							break;
						}
						
					}*/
					console.log(data);
					
					//============
					var send = {'AQI':data.data.aqi}//要送的資料(json)
					var url = 'AQI.php'//要送的網址
					$.get(url,send);//送到aqi存進session
					//============
					if(data.data.aqi<51){
						var color = '1.png';//綠
						var font_color = 'black';
						var keigoku = '空氣品質為良好';
						var remind = '今天空氣品質不錯，&#10;多出門走走吧';
					} else if (data.data.aqi>=51 && data.data.aqi<101){
						var color = '2.png';
						var font_color = 'black';
						var keigoku = '空氣品質為普通<br>對少數敏感族群有輕微影響';
						var remind = '今天空氣品質不錯，&#10;多出門走走吧';
					} else if (data.data.aqi>=101 && data.data.aqi<151){
						var color = '3.png';
						var font_color = 'black';
						var keigoku = '對敏感族群不健康<br>建議敏感族群出門可戴上口罩';
						var remind = '今天空氣品質不太好，&#10;雖可正常活動，但建議您&#10;減少長時間戶外劇烈運動';
					} else if (data.data.aqi>=151 && data.data.aqi<201){
						var color = '4.png';//紅色
						var font_color = 'white';
						var keigoku = '對所有族群不健康<br>建議民眾減少室外活動，&#10;必要時戴上口罩出門';
						var remind = '今天空氣品質不好，&#10;提醒您減少在戶外的活動；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					} else if (data.data.aqi>=201 && data.data.aqi<301){
						var color = '5.png';//紫色
						var font_color = 'white';
						var keigoku = '非常不健康<br>任何人都可能產生較嚴重的健康影響<br>必要時戴上口罩出門';
						var remind = '今天空氣品質很糟糕，&#10;提醒您若沒要事別出門；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					} else {
						var color = '6.png';//褐色
						var font_color = 'white';
						var keigoku = '危害<br>健康威脅達到緊急，所有人都可能受到影響';
						var remind = '今天空氣品質很糟糕，&#10;提醒您快點去避難。';
					}
						
					
					//============html================
					$('.pm2_5').html('<table><tr><td width="95" height = "50" rowspan="3"><img src = "/good_season_good_food/img/pm/'+color+'" width = "85" title = "'+remind+'"></td><td>AQI：'+data.data.aqi+'</td><td></td></tr><tr><td width="174"rowspan="2">'+keigoku+'</td><td width="1"></td></tr><tr><td></td></tr><tr><td colspan="2"><font size="1">　更新時間:'+data.data.time.s+'</font></td><td></td></tr></table>');
					//============html================
				},//1656埔里1621南投
				error: function(jqXHR) {
                    console.log(jqXHR);
				}
			});
		}
//	);
pm2_5();

</script>
<?php
	}
} else {
?>
<div class = "pm2_5"></div>
<script>
	//$('input[name=loading]').click(
		function pm2_5(){
			//var send = {'username':$('#UID').val()}
			var url = 'https://api.waqi.info/feed/@1656/?token=2716622fc5a07931a5e8c65dc73275ed8e0aa784'
			$.ajax({
				url:url,
				type:'GET',
				//timeout:5000,
				//data:send,
				dataType: "json",
				success:function(data){
					//console.log(data);
					//alert('123');
					//alert(data.feeds[0].date);
					/*var i;
					for(i = 1;i<=1000;i++){
						var a = data.feeds[i].SiteEngName;
						if(a =='Puli'){
							break;
						}
						
					}*/
					console.log(data);
					
					//============
					var send = {'AQI':data.data.aqi}//要送的資料(json)
					var url = 'AQI.php'//要送的網址
					$.get(url,send);//送到aqi存進session
					//============
					if(data.data.aqi<51){
						var color = '1.png';//綠
						var font_color = 'black';
						var keigoku = '空氣品質為良好';
						var remind = '今天空氣品質不錯，&#10;多出門走走吧';
					} else if (data.data.aqi>=51 && data.data.aqi<101){
						var color = '2.png';
						var font_color = 'black';
						var keigoku = '空氣品質為普通<br>對少數敏感族群有輕微影響';
						var remind = '今天空氣品質不錯，&#10;多出門走走吧';
					} else if (data.data.aqi>=101 && data.data.aqi<151){
						var color = '3.png';
						var font_color = 'black';
						var keigoku = '對敏感族群不健康<br>建議敏感族群出門可戴上口罩';
						var remind = '今天空氣品質不太好，&#10;雖可正常活動，但建議您&#10;減少長時間戶外劇烈運動';
					} else if (data.data.aqi>=151 && data.data.aqi<201){
						var color = '4.png';//紅色
						var font_color = 'white';
						var keigoku = '對所有族群不健康<br>建議民眾減少室外活動，&#10;必要時戴上口罩出門';
						var remind = '今天空氣品質不好，&#10;提醒您減少在戶外的活動；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					} else if (data.data.aqi>=201 && data.data.aqi<301){
						var color = '5.png';//紫色
						var font_color = 'white';
						var keigoku = '非常不健康<br>任何人都可能產生較嚴重的健康影響<br>必要時戴上口罩出門';
						var remind = '今天空氣品質很糟糕，&#10;提醒您若沒要事別出門；&#10;有氣喘的人可能需增加使用吸入劑的頻率。';
					} else {
						var color = '6.png';//褐色
						var font_color = 'white';
						var keigoku = '危害<br>健康威脅達到緊急，所有人都可能受到影響';
						var remind = '今天空氣品質很糟糕，&#10;提醒您快點去避難。';
					}
						
					
					//============html================
					$('.pm2_5').html('<table><tr><td width="95" height = "50" rowspan="3"><img src = "/good_season_good_food/img/pm/'+color+'" width = "85" title = "'+remind+'"></td><td>AQI：'+data.data.aqi+'</td><td></td></tr><tr><td width="174"rowspan="2">'+keigoku+'</td><td width="1"></td></tr><tr><td></td></tr><tr><td colspan="2"><font size="1">　更新時間:'+data.data.time.s+'</font></td><td></td></tr></table>');
					//============html================
				},//1656埔里1621南投
				error: function(jqXHR) {
                    console.log(jqXHR);
				}
			});
		}
//	);
pm2_5();

</script>
<?php
}
?>
</body>
</html>