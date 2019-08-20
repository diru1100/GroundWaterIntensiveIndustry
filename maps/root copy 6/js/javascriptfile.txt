var map = L.map('map', {
  center: [17.0, 76.0],
  minZoom: 2,
  zoom: 6
})

var currentZoom = map.getZoom();
var industryIconOptions = {
  iconUrl: 'Images/Industry.png',
  iconSize: [20, 20]
};

var industrySmokeIconOptions = {
  iconUrl: 'Images/IndustrySmoke.png',
  iconSize: [20, 20]
};

var SafeIconOptions = {
  iconUrl: 'Images/Safe.png',
  iconSize: [20, 20]
};

var SemiCriticalIconOptions = {
  iconUrl: 'Images/SemiCritical.png',
  iconSize: [20, 20]
};

var CriticalIconOptions = {
  iconUrl: 'Images/Critical.png',
  iconSize: [20, 20]
};
var OverExploitedIconOptions = {
  iconUrl: 'Images/OverExploited.png',
  iconSize: [20, 20]
};


var industryIcon = L.icon(industryIconOptions);
var industrySmokeIcon = L.icon(industrySmokeIconOptions);
var SafeIcon = L.icon(SafeIconOptions);
var SemiCriticalIcon = L.icon(SemiCriticalIconOptions);
var CriticalIcon = L.icon(CriticalIconOptions);
var OverExploitedIcon = L.icon(OverExploitedIconOptions);

var safeZone = L.markerClusterGroup();
var semiCriticalZone = L.markerClusterGroup();
var criticalZone = L.markerClusterGroup();
var overExploitedZone = L.markerClusterGroup();
var industries= L.markerClusterGroup();
var zones = new L.FeatureGroup();
var zonesclusters = new L.markerClusterGroup();
// var districts = new L.LayerGroup();
var guntur = new L.marker();
var vizag = new L.marker();

function ajax(e) {
  console.log('Ajax called.');
  var oReq = new XMLHttpRequest(); //New request object
  oReq.onload = function () {
    var js = JSON.parse(this.responseText);
    var j = 0;
    for (var i in js[0]) {

      if(js[0][i].EXTRACTION > js[0][i].LIMIT){
        marker = new L.marker([js[0][i].LATITUDE, js[0][i].LONGITUDE], { icon: industrySmokeIcon,
          name : js[0][i].INDUSTRY_NAME ,
          limit : js[0][i].LIMIT,
          extraction : js[0][i].EXTRACTION,
          recharge : js[0][i].RECHARGE
           });
      // markers.addLayer(L.marker(getRandomLatLng(map)));

      }else{
        marker = new L.marker([js[0][i].LATITUDE, js[0][i].LONGITUDE], { icon: industryIcon,
        name : js[0][i].INDUSTRY_NAME ,
          limit : js[0][i].LIMIT,
          extraction : js[0][i].EXTRACTION,
          recharge : js[0][i].RECHARGE
           });
       

      }
               marker.on('click',function(e){

            // debugger;
            // console.log(e.target.options);
            $(".industryTable").css("display","block");
            // debugger;
            $("#name").html(e.target.options.name);
            $("#limit").html(e.target.options.limit);
            $("#extraction").html(e.target.options.extraction);
            $("#recharge").html(e.target.options.recharge);

         });      
        industries.addLayer(marker);
    }
    for(var i in js[1]) {

      if(js[1][i].RATIO <=70){
         marker = L.marker([js[1][i].LATITUDE, js[1][i].LONGITUDE], { icon: SafeIcon }); 
         zones.addLayer(marker);
         zonesclusters.addLayer(marker);
      }else if(js[1][i].RATIO > 70 && js[1][i].RATIO <= 90){
         marker = L.marker([js[1][i].LATITUDE, js[1][i].LONGITUDE], { icon: SemiCriticalIcon }); 
         zones.addLayer(marker);
         zonesclusters.addLayer(marker);

      }else if(js[1][i].RATIO > 90 && js[1][i].RATIO <= 100){
         marker = L.marker([js[1][i].LATITUDE, js[1][i].LONGITUDE], { icon: CriticalIcon }); 
         zones.addLayer(marker);      
         zonesclusters.addLayer(marker);

      }else if(js[1][i].RATIO > 100){
         marker = L.marker([js[1][i].LATITUDE, js[1][i].LONGITUDE], { icon: OverExploitedIcon });
         zones.addLayer(marker); 
         zonesclusters.addLayer(marker);

      }

    }
     guntur = L.marker([js[2][1].LATITUDE, js[2][1].LONGITUDE]);
    guntur.addTo(map);
    vizag = L.marker([js[2][0].LATITUDE, js[2][0].LONGITUDE]);
    vizag.addTo(map);

    

  };
  oReq.open("get", "data.php", true);
  //                               ^ Don't block the rest of the execution.
  //                                 Don't wait until the request finishes to 
  //                                 continue.
  oReq.send();
  return false;
};

ajax();

// map.on('click',function(){
zones.on('click',function(){

  map.setView(zones.getLatLng(),12);
},zones);


map.on('zoomend',function(){
  if(map.getZoom() <= 16 && map.getZoom() >=10){
    map.removeLayer(zones);
  }
  else {
    map.addLayer(zones);
  }
  // if(map.getZoom() >=10){
  //   map.removeLayer(districts);
  // }else if(map.getZoom()< 10){
  //   map.addLayer(districts);
  // }
});
// district.on('click',function(){
//   console.log('hgdg');
// });

guntur.on('click',function(){

  console.log('fsdfsf');

});

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
}).addTo(map);

map.addLayer(industries);
// map.addLayer(zones);
 // map.addLayer(districts);





