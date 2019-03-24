<script src="js/jquery-3.2.1.js"></script>
<button id = 'reEmail'>重寄驗證信</button>
<div class = "pm2_5"></div>
<script>
	$("button[id='reEmail'").click(
		function(){
			var send = {'reEmail':<?php echo $row_Recordset1['Mail']; ?>};
			var url = 'reEmail.php';
			$.get(url,send);
			alert("信件已寄出");
		}
	);
</script>