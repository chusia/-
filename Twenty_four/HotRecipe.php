<?php
	$sql="Select * From recipe order by Count desc";
	$result = mysql_query($sql,$gsgf) or die("run error");
	$i = 0;
	while($row = mysql_fetch_array($result)){
		echo "<a href='";
		//!!!!!!!!!!!!!!!!網址記得改!!!!!!!!!!!!!!!!!!
		echo "/good_season_good_food/Twenty_four/".$row['RUrl'];
		//!!!!!!!!!!!!!!!!網址記得改!!!!!!!!!!!!!!!!!
		echo "'>";
		echo $row['RName'];
		echo "</a>";
		echo "<br />";
		$i = $i+1;
		if($i == 10){
			break;
		}
			
	}
	?>