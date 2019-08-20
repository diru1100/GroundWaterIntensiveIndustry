// See post: http://asmaloney.com/2014/01/code/creating-an-interactive-map-with-leaflet-and-openstreetmap/


var map = L.map( 'map', {
  center: [17.0, 76.0],
  minZoom: 2,
  zoom: 6
})

var labelMarkers = [];

function setAPdistrictLabels(){
    
}
function removeAPdistrictLabels(){
    
}



function setLabel(e){
         // Creating a Layer object
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
         map.addLayer(layer);
         
         // Creating a marker
         //var marker = L.marker([17.385044, 78.486671]);
         
         // Adding marker to the map
        // marker.addTo(map);
/*
var marker = L.marker(e.latlng)
    .bindTooltip("Test Label", 
    {
        permanent: true, 
        direction: 'right',
        opacity: 0.5
    }
).addTo(map);     

var myIcon = L.icon({
    iconUrl: 'my-icon.png',
    iconSize: [38, 95],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    shadowUrl: 'my-icon-shadow.png',
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
});
L.marker([50.505, 30.57], {icon: myIcon}).addTo(map);
*/


/*
 var shelter1 = L.marker([55.08, 11.62], {icon: shelterIcon});

var shelterMarkers = new L.FeatureGroup();

shelterMarkers.addLayer(shelter1);

map.on('zoomend', function() {
    if (map.getZoom() <7){
            map.removeLayer(shelterMarkers);
    }
    else {
            map.addLayer(shelterMarkers);
        }
});
 */
// var myIcon = L.Icon({
//   iconUrl: 'Icon.png'
// });
// you can set .my-div-icon styles in CSS
L.marker(e.latlng, {icon: myIcon}).addTo(map);

}
var zoomLevel = 6;


// map.on('click', function(e) { console.log(e.latlng.lat);  
// console.log(e.latlng.lng);
// map.setView([e.latlng.lat, e.latlng.lng]);
// zoomLevel++;
//         setTimeout(function(){
//             map.setZoom(zoomLevel);
//         }, 500);
// //map.zoomIn(1);
// setLabel(e);
/*
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

var bounds = [[18,77], [20,80]];

var rect = L.rectangle(bounds, {color: 'blue', weight: 1}).on('click', function (e) {
    // There event is event object
    // there e.type === 'click'
    // there e.lanlng === L.LatLng on map
    // there e.target.getLatLngs() - your rectangle coordinates
    // but e.target !== rect
    console.info(e);
}).addTo(map); */
//});

// map.on('dblclick', function(e) { 
// map.setView([17, 76]);
// zoomLevel = 6;
//         setTimeout(function(){
//             map.setZoom(zoomLevel);
//         }, 2000);
// });


map.on('click', function(e) { console.log(e.latlng.lat);  
console.log(e.latlng.lng);

// map.setView([e.latlng.lat, e.latlng.lng]);
// zoomLevel--;
//map.setZoom(zoomLevel);
        // setTimeout(function(){
        //     map.setZoom(zoomLevel);
        // }, 500);
//map.zoomOut(1);
ajax(e);
});
  var currentZoom= map.getZoom();
var industryIconOptions={
      iconUrl: 'Icon.png',
      iconSize: [20, 20]
  };

var industryIcon = L.icon(industryIconOptions);

var markers = new Array();

 var industries = new L.LayerGroup();

function ajax(e){
    console.log('Ajax called.');
    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        var js = JSON.parse(this.responseText);
        var j=0;
        // console.log(currentZoom);

        for(var i=0; i<js.length ; i++){
            // console.log(js[i].INDUSTRY_NAME);
            // console.log(js[i].LANGITUDE);
            // console.log(js[i].LONGITUDE);
            // console.log(js[i].ANNUAL_CONSUMPTION);
            // console.log(js[i].GROUND_WATER_LEVEL_1);
            // console.log(js[i].GROUND_WATER_LEVEL_2);

            
            
            markers[i]= new Array(2);
            markers[i][j]= js[i].LANGITUDE;
            // console.log(markers[i][j]);
            j++;
            markers[i][j]= js[i].LONGITUDE;

            // console.log(js[i].INDUSTRY_NAME);
            // console.log(js[i].LANGITUDE);
            // console.log(js[i].LONGITUDE);
            // console.log(js[i].ANNUAL_CONSUMPTION);
            // console.log(js[i].GROUND_WATER_LEVEL_1);
            // console.log(js[i].GROUND_WATER_LEVEL_2);
            // console.log(markers[i][j]);
            j=0;
          

        }
         for (i = 0; i < markers.length; i++) {


               marker = L.marker([markers[i][0], markers[i][1]],{icon : industryIcon});
              industries.addLayer(marker);
            }
      if(map.getZoom()>8){
        industries.addTo(map);

         // for (var i=0; i<markers.length; i++) {
           
         //    var lat = markers[i][0];
         //    var lng = markers[i][1];
         //    L.marker([lat,lng],{icon : industryIcon}).addTo(map);
           //L.marker([lat,lng],{icon : industryIcon}).addTo(industries);
            
                        
           
            
             // var markerLocation = new L.LatLng(lat, lon);
             // var marker = new L.Marker(markerLocation,{icon : industryIcon});
             // map.addLayer(marker);
         
             // marker.bindPopup(popupText);
         
        // }
       }
        //console.log(js);
    };
    //alert(e.latlng.lat + 'OK');
    oReq.open("get", "data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
    return false;
};



  map.on('zoomend', function() {
    if (map.getZoom() <7){
            map.removeLayer(industries);
    }
    else {
            map.addLayer(industries);
        }
});


L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
}).addTo(map)



// var myURL = jQuery( 'script[src$="leaf-demo.js"]' ).attr( 'src' ).replace( 'leaf-demo.js', '' )

// var myIcon = L.icon({
//   iconUrl: 'Icon.png'
// })

// for ( var i=0; i < markers.length; ++i )
// {
//  L.marker( [markers[i].lat, markers[i].lng], {icon: myIcon} )
//   .bindPopup( '<a href="' + markers[i].url + '" target="_blank">' + markers[i].name + '</a>' )
//   .addTo( map );
// }