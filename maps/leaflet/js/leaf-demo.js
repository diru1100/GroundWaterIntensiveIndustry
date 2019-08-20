	var mapOptions = {
   		center: [21.146633, 79.088860],
   		zoom: 5
	}
 //	var mymap = new L.map('mapid',mapOptions);
   	var mymap = L.map('mapid', {
   		maxZoom: 15,
   		minZoom: 2, 
   		maxBounds:[
   			[6.933301, 67.958608],
   			[37.215475, 97.804750]
   		]
   	}).setView([20.5937,78.9629], 13);
   	var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
   	mymap.addLayer(layer);

   /*	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors,'+  
     '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>,'+
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZGlydTExMDAiLCJhIjoiY2pzZHo4NXp5MG52NTQ0bnhna21udWJydSJ9.61MqqvAQEMGa8dKMnAkWFw'
}).addTo(mymap);*/
	
	// Icon options
	var iconOptions = {
   		iconUrl: 'Icon.png',
   		iconSize: [20, 20]
	}

	// Creating a custom icon
	var customIcon = L.icon(iconOptions);

	var markerOptions = {
   		title: "MyLocation",
   		clickable: true,
   		icon: customIcon
	}

	var marker = new L.Marker([17.385044, 78.486671],markerOptions);
 	
   	marker.bindPopup('Here Industry').openPopup();
   	// Options for the marker

   	var geojsonFeature = 
{
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "LineString",
        "coordinates": [
          [
            77.442626953125,
            22.100273156516327
          ],
          [
            77.55729675292969,
            22.121902144785466
          ],
          [
            77.56141662597655,
            22.06209626616549
          ],
          [
            77.55935668945312,
            22.058914392951394
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Polygon",
        "coordinates": [
          [
            [
              78.23089599609375,
              17.536677642553208
            ],
            [
              78.2611083984375,
              17.429269667952468
            ],
            [
              78.33251953125,
              17.4187874493387
            ],
            [
              78.35723876953124,
              17.35063837604883
            ],
            [
              78.365478515625,
              17.26672782352052
            ],
            [
              78.39019775390625,
              17.20376982191752
            ],
            [
              78.607177734375,
              17.24312108825937
            ],
            [
              78.68682861328125,
              17.35850302528817
            ],
            [
              78.67584228515625,
              17.434510551522894
            ],
            [
              78.651123046875,
              17.5078670964508
            ],
            [
              78.6181640625,
              17.568102108678996
            ],
            [
              78.57147216796875,
              17.583812296355177
            ],
            [
              78.4368896484375,
              17.6099929086062
            ],
            [
              78.37921142578125,
              17.5628650763021
            ],
            [
              78.23089599609375,
              17.536677642553208
            ]
          ]
        ]
      }
    }
  ]
};
    // let locationData = [
    //   "area": "hyderabad",
    //   "coordinatesData": [
    //   {
    //     "industry_name": "Simhadripuram",
    //     "gd_lvl_1":12,
    //     "gd_lvl_2":18,
    //     "annual_consumption": 1000000,
    //     "coordinates":[14.62138889, 14.62138889]
    //   },  {
    //     "industry_name": "Pendlimarri",
    //     "gd_lvl_1":10,
    //     "gd_lvl_2":12,
    //     "annual_consumption": 6000,
    //     "coordinates":[14.26666667, 78.76666667]
    //   },{
    //     "industry_name": "Thondur",
    //     "gd_lvl_1":12,
    //     "gd_lvl_2":11,
    //     "annual_consumption": 250000,
    //     "coordinates":[14.53694444, 78.2725]
    //   },{
    //     "industry_name": "Veerapanayanipalle",
    //     "gd_lvl_1":9,
    //     "gd_lvl_2":8,
    //     "annual_consumption": 18000,
    //     "coordinates":[14.53305556, 78.49444444]
    //   }
    //   ]
    // ]  
    var hyd = L.geoJSON(geojsonFeature);
    hyd.on("click", function (event) {
    	// Assuming the clicked feature is a shape, not a point marker.
      console.log('hi');

    	mymap.fitBounds(event.layer.getBounds());
    	marker.addTo(mymap);

    });

    hyd.addTo(mymap)
