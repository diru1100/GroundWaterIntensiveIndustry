var map = L.map('map', {
  center: [17.0, 76.0],
  minZoom: 2,
  zoom: 6
})



var currentZoom = map.getZoom();
var industryIconOptions = {
  iconUrl: 'Icon.png',
  iconSize: [20, 20]
};

var industryIcon = L.icon(industryIconOptions);


// var industries = new L.LayerGroup();

var markers = L.markerClusterGroup();


function ajax(e) {
  console.log('Ajax called.');
  var oReq = new XMLHttpRequest(); //New request object
  oReq.onload = function () {
    var js = JSON.parse(this.responseText);
    var j = 0;
    
    for (var i in js) {
      marker = L.marker([js[i].LANGITUDE, js[i].LONGITUDE], { icon: industryIcon });
      // markers.addLayer(L.marker(getRandomLatLng(map)));
      markers.addLayer(marker);

    }

  };
  oReq.open("get", "data.php", true);
  //                               ^ Don't block the rest of the execution.
  //                                 Don't wait until the request finishes to 
  //                                 continue.
  oReq.send();
  return false;
};

ajax();



L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
}).addTo(map);

map.addLayer(markers);




