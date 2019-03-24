var weather = (function() {
    //取用API參考 https://works.ioa.tw/weather/api/doc/index.html#api-Weather_API-GetHttpsWorksIoaTwWeatherApiCatesIdJson
    //地理範圍及對應代號, 參考 https://works.ioa.tw/weather/api/all.json
    var locationObj = {"埔里鎮": "171"};

    function _handleAddTask() {
        $.each(locationObj, function(location, id) {
            $.ajax({
                method: "GET",
                url: "https://works.ioa.tw/weather/api/weathers/" + id + ".json",
                dataType: "json",
                error: function(jqXHR) {
                    console.log(jqXHR);
                },
                success: function(data) {
					console.log(data);
					//============
					var send = {'Rain':data.rainfall}//要送的資料(json)
					var url = 'AQI.php'//要送的網址
					$.get(url,send);//送到aqi存進session
					//============
                    let img_url = "https://works.ioa.tw/weather/img/weathers/zeusdesign/" + data.img;
                    $("#weather").append(
                        `
                        <div class="card p-2 d-flex flex-row" style="min-width: 280px; max-width: 330px;">
                            <img style="flex: 1;" src="${img_url}" alt="${data.desc}">
                            <div class="d-flex flex-column" style="flex: 2;">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title">${location}</h4>
                                        <h6 class="card-subtitle text-muted">南投縣</h6>
                                    </div>
                                    <div class="p-2">
                                        <h4 class="card-subtitle text-muted">${data.temperature}&#8451;</h4>
                                        <span class="blockquote-footer" style="text-align:right;">${data.desc}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse justify-content-around">
                                    <span class="badge badge-pill badge-primary">濕度: ${data.humidity}%</span>
                                    <span class="badge badge-pill badge-info">降雨量: ${data.rainfall}</span>
                                </div>
                            </div>
                        </div>
                        `
                    );
                }
            });
        });
    }

    function init() {
        _handleAddTask();
        console.log("init");
    }

    return {
        init
    };
})();