function CheckIDLength(){
	var a = document.getElementById('UserID').value;
	if(a.length<5||a.length>15|| a == null || a.search(/[a-zA-Z]/g) == -1 || a.search(/[\W]/g) != -1){//限英數
    	alert("帳號不符合格式");
		UserID.value = "";
	}
}
function CheckPsdLength(){
	var a = document.getElementById('Psd').value;
	if(a.length<7||a.length>15||a == null || a.search(/[0-9]/g) == -1 || a.search(/[a-zA-Z]/g) == -1 || a.search(/[\W]/g) != -1){
    	alert("密碼不符合格式");
		Psd.value = "";
	}
}
function CheckPsdSame(){
	document.getElementById('Psd');
	document.getElementById('PsdCheck');
	if(Psd.value!=PsdCheck.value){
		alert("兩次輸入的密碼不同，請重新輸入")
		PsdCheck.value = "";
	}
}
function CheckEmail(){
	var a = document.getElementById('Mail').value;
	if(a.length<10 || a == null || a.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/g) == -1){//限mail格式
    	alert("E-mail不符合格式");
		Mail.value = "";
	}
}
function CheckWeight(){
	var a = document.getElementById('Weight').value;
	if(a.length>3||a == null || a.search(/[\D]/g) != -1 || a < 20 || a > 300){
    	alert("請輸入正確的體重");//限數字
		Weight.value = "";
	}
}
function CheckHeight(){
	var a = document.getElementById('Height').value;
	if(a.length>3||a == null || a.search(/[\D]/g) != -1 || a < 50 || a > 300){
    	alert("請輸入正確的身高");
		Height.value = "";
	}
}
function CheckContents(){
	var a = document.getElementById('Content').value;
	if(a.length > 500 || a == null || a.search(/script/i) != -1 || a.search(/%/) != -1 || a.search(/#/) != -1 || a.search(/_session/i) != -1 || a.search(/_cookie/i) != -1 || a.search(/!--/) != -1 || a.search(/&/) != -1 || a.search(/php/i) != -1){
	alert("超過字數或含有禁止的字元");//禁止字元
	Content.value = "";
	}
}
