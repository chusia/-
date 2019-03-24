<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--===================JS==========================-->
<script src="Login/js/jquery-3.2.1.js"></script>
<?php
function get_chinese_weekday($datetime)
{
    $weekday  = date('w', strtotime($datetime));
    $weeklist = array('日', '一', '二', '三', '四', '五', '六');
    return '星期' . $weeklist[$weekday];
}
?>
<!--===================JS==========================-->
<title>一周天氣</title>
</head>
<body>

<div class = "WeekWeather"></div>
<script>
	//$('input[name=loading]').click(
		function WeekWeather(){
			//var send = {'username':$('#UID').val()}
			var url = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22puli%2C%20tw%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys'
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
					var i;
/*					for(i = 1;i<=1000;i++){
						var a = data.feeds[i].SiteEngName;
						if(a =='Puli'){
							break;
						}
						
					}*/
					console.log(data);
					
					//============
					/*var send = {'AQI':data.feeds[i].AQI}//要送的資料(json)
					var url = 'AQI.php'//要送的網址
					$.get(url,send);//送到aqi存進session*/
					//============
					/*if(data.feeds[i].AQI<51){
						var color = '1.png';//綠
						var font_color = 'black';
						var keigoku = '空氣品質為良好';
					}*/
						
					
					//============html================
					var white = '';
						$('.WeekWeather').html('<p><font size = "5">南投縣埔里鎮</font></p><table><tr height = "300"><td></td><td colspan = "2" align = "center"><?php echo date("m/d")?><br><?php echo get_chinese_weekday(date("Y/m/d"));?><br><img src = "img/weather/'+data.query.results.channel.item.forecast[0].text+'.png" width = "200" title="'+data.query.results.channel.item.forecast[0].text+'"><br>'+Math.round((data.query.results.channel.item.forecast[0].high-32)*5/9)+'&#8451;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+Math.round((data.query.results.channel.item.forecast[0].low-32)*5/9)+'&#8451;</td><td></td><td colspan = "2">濕度：'+data.query.results.channel.atmosphere.humidity+'%<br>風速：'+data.query.results.channel.wind.speed+'km/h<br>日升：'+data.query.results.channel.astronomy.sunrise+'<br>日落：'+data.query.results.channel.astronomy.sunset+'</td></tr><tr align = "center"><td>'<?php 
		for($i = 1;$i<7;$i++){
	 ?>+white+'<?php echo date("m/d",strtotime("+".$i." day"))?><br><?php echo get_chinese_weekday(date("Y-m-d",strtotime("+".$i." day")))?><br>&nbsp;&nbsp;&nbsp;<img src = "img/weather/'+data.query.results.channel.item.forecast[<?php echo $i;?>].text+'.png" width = "80" title="'+data.query.results.channel.item.forecast[<?php echo $i ?>].text+'">&nbsp;&nbsp;&nbsp;<br>'+Math.round((data.query.results.channel.item.forecast[<?php echo $i;?>].high-32)*5/9)+'&#8451;&nbsp;'+Math.round((data.query.results.channel.item.forecast[<?php echo $i;?>].low-32)*5/9)+'&#8451;</td><td>'<?php 
						}
						?>+white+'</td></tr></table>');
					
					//============html================
				},
				error: function(jqXHR) {
                    console.log(jqXHR);
				}
			});
		}
//	);
WeekWeather();
</script>

</body>
</html>