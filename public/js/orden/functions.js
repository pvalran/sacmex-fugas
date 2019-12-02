var mainMap;
var layerBase;
var layerOrden;
var popup = null;

var fn_newgeomJson = function (GeoJson) {
	var SqlJson = {
		'type' : '',
		'coordinates' : []
	};
	SqlJson.type = GeoJson.geometry.type;
	SqlJson.coordinates = GeoJson.geometry.coordinates;
	var geom = "ST_SetSRID(ST_GeomFromGeoJSON('" + JSON.stringify(SqlJson) + "'),4326)";
	return geom;
};

var fn_datainfo = function(geom, radius) {
	var sqlSelFilter = '';

	var sql = new cartodb.SQL({
		user : 'dev',
        sql_api_template:"http://cartodb.localhost/user/{user}"
	});
	if (radius != 0){
		geom = "ST_Buffer(" + geom + "::geography," + radius + ")::geometry"
	}

	//var strsql = "select string_agg(idintervencion::text, ',') as idintervencion from (SELECT idintervencion FROM agu_digitarpunto dl where (ST_contains(" + geom + ",dl.the_geom) or ST_Intersects(" + geom + ",the_geom)) and dl.idintervencion in ("+sqlSelFilter+")" ;
	//strsql += " union SELECT idintervencion  FROM agu_digitarlinea dl where (ST_contains(" + geom + ",the_geom) or ST_Intersects(" + geom + ",dl.the_geom)) and  dl.idintervencion in ("+sqlSelFilter+")) info ";

    var strsql = "select * from orden_fugas fugas where ST_Contains("+geom+",fugas.the_geom) and fugas.estado = 1";
    sql.execute(strsql).done(function(data) {
        for (var idx in data.rows){
            _.templateSettings.variable = "item";
            var template = _.template($("#itemOrden").html());
            $("#lstOrden").append(template(data.rows[idx]));
        }
    }).error(function(errors) {
		$("#loadingMap").hide();
		console.log("errors:" + errors);
	});
};

var onReporte = function(evt){
    var NorthEast = mainMap.getBounds().getNorthEast();
    var NorthWest = mainMap.getBounds().getNorthWest();
    var SouthWest = mainMap.getBounds().getSouthWest();
    var SouthEast = mainMap.getBounds().getSouthEast();

    var SqlJson = {
        geometry:{
		    'type' : 'Polygon',
		    'coordinates' : [[
                [NorthEast.lng,NorthEast.lat],
                [NorthWest.lng,NorthWest.lat],
                [SouthWest.lng,SouthWest.lat],
                [SouthEast.lng,SouthEast.lat],
                [NorthEast.lng,NorthEast.lat]
            ]]
	    }
    };

    var geom =  fn_newgeomJson(SqlJson);
};

var closeInfo = function(){
    $("#pnlReportFuga").hide();
};

var onAsignarCuadrilla = function () {

}

var onCrearOrden = function () {
    var ids = $("#lstOrden .card").map(function() {
        return $(this).data("carto");
    }).get().join(',');

    var sql = new cartodb.SQL({
        user : 'dev',
        api_key: 'b74d28f7ecd3ec7e370d0756837905dc0f0c3cd5',
        sql_api_template:"http://cartodb.localhost/user/{user}"
    });

    var strsql = "update orden_fugas set estado = 2, id_cuadrilla = "+parseInt($("#cuadrilla").val())+" where cartodb_id in  ("+ids+")";
    sql.execute(strsql).done(function(data) {
        layerOrden.hide();
        layerOrden.show();
    }).error(function(errors) {

    });
}

var onCheckboxReporte = function(evt){
    evt.stopPropagation();
}
