var latitude  = "23.5";
var longitude = "121";
	
$.ajax({
  type: 'POST',                     //GET or POST
  url: "https://maps.google.com/maps/api/geocode/json?latlng=" + latitude + "," + longitude + "&key=AIzaSyCBxkXpK4tMr1-q3W7AydK-0WkLAzsALt4",  //請求的頁面
  cache: false,   //是否使用快取
  dataType : 'json',
  success: function(result){   //處理回傳成功事件，當請求成功後此事件會被呼叫
      //var myObj = $.parseJSON(result);
      //console.log(result);
	<p>地點:</p>
	<p>${result.results}</p>
  },
  error: function(result){   //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
    unction(jqXHR) {
    console.log(jqXHR);
  },
  complete: function(result) {

  },
  statusCode: {                     //狀態碼處理
      404: function() {
        alert("page not found");
      }
    }
});