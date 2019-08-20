// See post: http://asmaloney.com/2014/01/code/creating-an-interactive-map-with-leaflet-and-openstreetmap/


var map = L.map( 'map', {
  center: [17.0, 76.0],
  minZoom: 2,
  zoom: 6
})



function setLabel(e){
         // Creating a Layer object
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
         map.addLayer(layer);
         

L.marker(e.latlng, {icon: myIcon}).addTo(map);

}
var zoomLevel = 6;

  var currentZoom= map.getZoom();
var industryIconOptions={
      iconUrl: 'Icon.png',
      iconSize: [20, 20]
  };

var industryIcon = L.icon(industryIconOptions);

var markersI = new Array();
var markersZ = new Array();
var markersD = new Array();
// var smarker= new L.marker(14.62138889,78.25166667);
// var smarker1= new L.marker(15.62138889,78.25166667);

 var industries = new L.LayerGroup();
 var zone = new L.LayerGroup();
 var district = new L.LayerGroup();

function ajax(e){
    console.log('Ajax called.');
    var oReq = new XMLHttpRequest(); 
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        var js= Array();
        js= JSON.parse(this.responseText);
        //js[1]= JSON.parse(this.responseText[1]);
          console.log(js[0]);
        //js[1] = JSON.parse(this.responseText);
          console.log(js[1]);
        var j=0;
        // console.log(currentZoom);

        for(var i=0; i<js[0].length ; i++){
          var j=0;
            markersD[i]= new Array(2);
            markersD[i][j]= js[0][i].LATITUDE;
            // console.log(markers[i][j]);
            j++;
            markersD[i][j]= js[0][i].LONGITUDE;
            j=0;
        }

        for(var i=0; i<js[1].length ; i++){
          var j=0;
            markersZ[i]= new Array(2);
            markersZ[i][j]= js[1][i].LATITUDE;
            // console.log(markers[i][j]);
            j++;
            markersZ[i][j]= js[1][i].LONGITUDE;
            j=0;
        }

         for (i = 0; i < markersD.length; i++) {
               marker = L.marker([markersD[i][0], markersD[i][1]],{icon : industryIcon});
              district.addLayer(marker);
            }
        for (i = 0; i < markersZ.length; i++) {


               marker = L.marker([markersZ[i][0], markersZ[i][1]],{icon : industryIcon});
               zone.addLayer(marker);
               // console.log('hi');
            }


      if(map.getZoom()>4 && map.getZoom() <6){
        district.addTo(map);
        console.log('bye');

       }

      if(map.getZoom() >6 && map.getZoom()<16){
        zone.addTo(map);
       }
    };
    oReq.open("get", "data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
    return false;
};


  map.on('zoomend', function() {
    if (map.getZoom() >=4 && map.getZoom() <=6){
            map.removeLayer(industries);
            map.removeLayer(zone);
            map.addLayer(district);
    }
    else if(map.getZoom() >11 && map.getZoom() <=13) {
            map.removeLayer(industries);
            map.addLayer(zone);
            map.removeLayer(district);
        }
    else{
      map.addLayer(industries);
      map.removeLayer(zone);
      map.removeLayer(district);
    }
});

map.on('click', function(e) { console.log(e.latlng.lat);  
  
console.log(e.latlng.lng);
console.log(map.getZoom());
ajax(e); 
    if (map.getZoom() >=7 && map.getZoom() <=11){
            map.removeLayer(industries);
            map.removeLayer(zone);
            map.addLayer(district);
    }
    else if(map.getZoom() >11 && map.getZoom() <=13) {
            map.removeLayer(industries);
            map.addLayer(zone);
            map.removeLayer(district);
        }
    else{
      map.addLayer(industries);
      map.removeLayer(zone);
      map.removeLayer(district);
    }
   
});   
L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
}).addTo(map)
