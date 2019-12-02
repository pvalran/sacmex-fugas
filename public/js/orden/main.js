    $(function(){
        var capaBase = "https://{s}.base.maps.api.here.com/maptile/2.1/maptile/newest/normal.day/{z}/{x}/{y}/256/png8?lg=eng&token=A7tBPacePg9Mj_zghvKt9Q&app_id=KuYppsdXZznpffJsKT24";
        var paramBase = {
            minZoom: 0,
            maxZoom: 20,
            subdomains: "1234",
            attribution: "&copy; <a href=\"http://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors"
        };
        var paramMapBase = {
            center: new L.LatLng(19.46496362329332, -99.18272495269775),
            zoom: 10,
            minZoom: 0,
            maxZoom: 20
        };
        var map = 'divMapMain';
        var user ={
            user: 'dev'
        };
        var viz = {
            user_name: 'dev',
            api_key: 'b74d28f7ecd3ec7e370d0756837905dc0f0c3cd5',
            maps_api_template:"http://cartodb.localhost/user/{user}",
            sql_api_template:"http://cartodb.localhost/user/{user}",
            tiler_protocol:"http",
            tiler_domain:"cartodb.localhost",
            tiler_port:"80",
            filter:"mapnik",
            type:"cartodb",
            sublayers: [{
                sql: "SELECT * FROM geo_delegacion",
                cartocss: `
                    #layer {
                        polygon-fill: transparent;
                        polygon-opacity: 0;
                    }
                    #layer::outline {
                        line-width: 2;
                        line-color: #000000;
                        line-opacity: 1;
                    }
                `,
                interactivity: "cartodb_id"
            },{
                sql: "SELECT * FROM geo_campamenos",
                cartocss: `
                    #layer  [zoom >= 11]{
                        polygon-fill: #4ca949;
                        polygon-opacity: 0;
                    }
                    #layer::outline [zoom >= 11]{
                        line-width: 2;
                        line-color: #4ca949;
                        line-opacity: 0.5;
                    }
                `,
                interactivity: "cartodb_id"
            },{
                sql: "SELECT * FROM geo_coloniascdmx",
                cartocss: `
                    #layer  [zoom >= 13]{
                        polygon-fill: #826dba;
                        polygon-opacity: 0;
                    }
                    #layer::outline [zoom >= 13]{
                        line-width: 1.5;
                        line-color: #000000;
                        line-opacity: 1;
                    }
                `,
                interactivity: "cartodb_id"
            },{
                sql: "SELECT * FROM geo_manzana",
                cartocss: `
                    #layer  [zoom > 14]{
                        polygon-fill: #8cf08c;
                        polygon-opacity: 0.5;
                    }
                    #layer::outline  [zoom > 14]{
                        line-width: 1;
                        line-color: #000000;
                        line-opacity: 1;
                    }
                `,
                interactivity: "cartodb_id"
            },{
                sql: "SELECT * FROM orden_fugas",
                cartocss: `
                    #layer [zoom > 14]{
                       #layer {
                            marker-width: 10;
                            marker-fill: ramp([estado], (#f31441, #FFFF00, #43f816, #888888), (1, 2, 3), "=", category);
                            marker-fill-opacity: 1;
                            marker-allow-overlap: true;
                            marker-line-width: 2;
                            marker-line-color: #000000;
                            marker-line-opacity: 1;
                       }
                    }
                `,
                interactivity: "cartodb_id"
            }]
        };
        var objMap = new cdmxCarto(capaBase,viz,map,user,paramBase,paramMapBase);
        var callBack = function(layer){
            lyrMain = layer;
            mainMap = objMap._map;

            mainMap.on("zoomend",onReporte);
            mainMap.on("moveend",onReporte);

            drawnItems = new L.FeatureGroup();
            drawnItems.bringToBack();
            mainMap.addLayer(drawnItems);

    		L.drawLocal.draw.toolbar.buttons.circle = 'Seleccionar por circulo';
        	// Set the tooltip start text for the rectangle
    		L.drawLocal.draw.handlers.circle.tooltip.start = 'Dibuja el circulo';

		    var drawControl = new L.Control.Draw({
			    position : 'topleft',
			    draw : {
			        rectangle:false,
                    polygon:false,
                    polyline:false,
                    circle:true,
				    marker : true,
				    /*circle:{
					    shapeOptions: {
						    stroke: true,
    						color: '#E43A87',
    						weight: 4,
    						opacity: 0.5,
    						fill: false,
    						clickable: true
					    }
				    }*/
			    },
    			edit : {
    				featureGroup : drawnItems,
    				edit : true,
    				remove : true
    			}
		    });
    		mainMap.addControl(drawControl);
    		mainMap.on('draw:created', function(e) {
    			var type = e.layerType;
    			var lyr = e.layer;
    			var coord = lyr.toGeoJSON();
    			drawnItems.clearLayers();
    			switch(type){
    				case "rectangle":

    					break;
    				case 'circle':
                        $("#lstOrden").html('');
    					fn_datainfo(fn_newgeomJson(coord), lyr.getRadius());
    					break;
    				case 'polygon':

    					break;
    				case 'polyline':

    					break;
    			}
                drawnItems.addLayer(lyr);
    		});
            layerOrden = layer.getSubLayer(4);
            layer.getSubLayer(4).setInteraction(true);
            layer.getSubLayer(4).setInteractivity("cartodb_id,ticket,fecha_registro,id_regional,direccion,estado");
            layer.getSubLayer(4).on('featureClick', function(e, latlng, pos, data, layer) {
                _.templateSettings.variable = "item";
                var template = _.template($("#itemOrden").html());
                $("#lstOrden").append(template(data));

            });

            layer.getSubLayer(4).on('mouseover',function(){
                $("#divMapMain").css('cursor','pointer');
            });

            layer.getSubLayer(4).on('mouseout',function(){
                $("#divMapMain").css('cursor','grab');
            });

            var sql = new cartodb.SQL({
                user : 'dev',
                sql_api_template:"http://cartodb.localhost/user/{user}"
            });

            var strsql = "select  cartodb_id,ticket,fecha_registro,direccion,estado from orden_fugas";
            sql.execute(strsql).done(function(data) {
                dataOrden.rows.add(data.rows).draw();
            }).error(function(errors) {
                $("#loadingMap").hide();
                console.log("errors:" + errors);
            });
        };
        objMap.renderMap(callBack);
    });
