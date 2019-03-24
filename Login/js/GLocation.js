// JavaScript Document



if (!vm.location.address && navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function (position) {
		var pos = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		};
		$scope.$apply(function () {
			vm.location.longitude = pos.lng.toFixed(6);
			vm.location.latitude = pos.lat.toFixed(6);
		});
		map.setCenter(pos);
		marker.setPosition(pos);
		cityCircle.setCenter(pos);
	})
}
