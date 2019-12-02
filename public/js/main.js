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
        zoom: 16,
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
                #layer {
                    polygon-fill: #4ca949;
                    polygon-opacity: 0;
                }
                #layer::outline {
                    line-width: 2;
                    line-color: #4ca949;
                    line-opacity: 0.5;
                }
            `,
            interactivity: "cartodb_id"
        },{
            sql: "SELECT * FROM geo_coloniascdmx",
            cartocss: `
                #layer {
                    polygon-fill: #826dba;
                    polygon-opacity: 0;
                }
                #layer::outline {
                    line-width: 1.5;
                    line-color: #000000;
                    line-opacity: 1;
                }
            `,
            interactivity: "cartodb_id"
        },{
            sql: "SELECT * FROM geo_manzana",
            cartocss: `
                #layer {
                    polygon-fill: #8cf08c;
                    polygon-opacity: 0.5;
                }
                #layer::outline {
                    line-width: 1;
                    line-color: #000000;
                    line-opacity: 1;
                }
            `,
            interactivity: "cartodb_id"
        },{
            sql: "SELECT * FROM geo_red_primaria",
            cartocss: `
                #layer {
                    ::line {
                        line-width: 5;
                        line-color: #256D7B;
                    }
                    ::dash {
                        line-color: #FFFFFF;
                        line-width: 2.5;
                        line-dasharray: 6, 6;
                    }
                }
            `,
            interactivity: "cartodb_id"
        },{
            sql: "SELECT * FROM geo_red_secundaria",
            cartocss: `
                #layer {
                    line-width: 3;
                    line-cap: round;
                    line-dasharray: 10, 10;
                }
            `,
            interactivity: "cartodb_id"
        },{
            sql: "SELECT * FROM geo_pozoaguapotable",
            cartocss: `
                #layer {
                    marker-width: 18;
                    marker-fill: #b8ccd1;
                    marker-fill-opacity: 0.9;
                    marker-file: url('https://s3.amazonaws.com/com.cartodb.users-assets.production/maki-icons/pharmacy-18.svg');
                    marker-allow-overlap: true;
                    marker-line-width: 1;
                    marker-line-color: #000000;
                    marker-line-opacity: 1;
                }
            `,
            interactivity: "cartodb_id"
        },{
            sql: "SELECT * FROM geo_red_secundaria_cajas",
            cartocss: `
                #layer {
                    marker-width: 7;
                    marker-fill: #4f8490;
                    marker-fill-opacity: 0.9;
                    marker-allow-overlap: true;
                    marker-line-width: 1;
                    marker-line-color: #FFFFFF;
                    marker-line-opacity: 1;
                }
            `,
            interactivity: "cartodb_id"
        }]
    };
    var objMap = new cdmxCarto(capaBase,viz,map,user,paramBase,paramMapBase);
    var callBack = function(layer){
        lyrMain = layer;
        mainMap = objMap._map;
        mainMap.on("click",onClickMap);
    };
    objMap.renderMap(callBack);
});

/**
#layer {
  ::line {
    line-width: 5;
    line-color: #256D7B;
  }
  ::dash {
    line-color: #FFFFFF;
    line-width: 2.5;
    line-dasharray: 6, 6;
  }
}
**/
