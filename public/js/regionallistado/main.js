$(function(){
    var sql = new cartodb.SQL({
        user : 'dev',
        sql_api_template:"http://cartodb.localhost/user/{user}"
    });

    var strsql = "select  cartodb_id,ticket,fecha_registro,direccion,estado from orden_fugas";
    sql.execute(strsql).done(function(data) {
        dataOrden.rows.add(data.rows).draw();
    }).error(function(errors) {
        console.log("errors:" + errors);
    });
});
