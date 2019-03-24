<?php
if (!isset($_SESSION)) {
  session_start();
}
echo "今天的空氣指數AQI為 ".$_SESSION['AQI']."，";
if($row_Recordset1['Allergy'] == 'Y'){
	if($_SESSION['AQI']>100){
		echo "提醒敏感族群的您減少在戶外劇烈活動，若要外出建議戴口罩；由室外進入室內時，可加強個人衛生防護，例如洗手、洗臉、清潔鼻腔；具有氣喘的人可能需增加使用吸入劑的頻率。";
	} else if($_SESSION['AQI']>50 && $_SESSION['AQI']<=100){
		echo "可正常活動，但建議您出門時多注意可能產生的咳嗽或呼吸急促症狀";
	} else {
		echo "今天空氣品質不錯，多出門走走吧";
	}
} else {
	if($_SESSION['AQI']>150){
		echo "提醒減少在戶外劇烈活動，若要外出建議戴口罩；由室外進入室內時，可加強個人衛生防護，例如洗手、洗臉、清潔鼻腔;具有氣喘的人可能需增加使用吸入劑的頻率。。";
	} else if($_SESSION['AQI']>100 && $_SESSION['AQI']<=150){
		echo "可正常活動，但建議您減少長時間戶外劇烈運動";
	} else {
		echo "今天空氣品質不錯，多出門走走吧";
	}
}
?>
</body>
