@extends('core.layout')
@section('css')
<script type="text/template" id="itemReporteFuga">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-header">
            Incidencia de fugas
            <button id="btn-info_close"class="close" type="button" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="card-body">
            <h4 class="card-title"><strong>Numero de ticket:<%- item.ticket %></strong></h4>
            <h5 class="card-title">Direccion:</h5>
            <p class="card-text"><%- item.direccion %></p>
            <h5 class="card-title">Descripcion:</h5>
            <p class="card-text"><%- item.descripcion %></p>
        </div>
    </div>
</script>
@endsection
@section('toolbar')
<ul class="nav nav-pills nav-fill">
    <li class="nav-item"></li>
    <li class="nav-item"></li>
    <li class="nav-item d-flex justify-content-end">
        <form class="col-7 mr-0 pr-0">
            <div class="input-group" style="width: 100%">
                <input type="text" class="form-control form-control-sm" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </li>
</ul>
@endsection

@section('contents')
<div id="divMapMain">
    <button class="btn btn-primary btn-circle btn-sm btn-reporte"
            data-toggle="tooltip" data-placement="right" title="Orden de trabajo"
    >
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </button>
    <div class="row" style="height: 100%">
        <div class="col-xs-9 col-sm-9 col-md-9 flex-row align-self-end px-0" style="z-index: 1;margin-bottom: 94px;">
            <div id="pnlReportFuga">Posicion</div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 px-0" style="height: 100%;">
            <div class="card border-left-primary panel-Ubicacion"  style="background-color: rgba(255,255,255,0.67);">
                <div class="card-body flex-column">
                    <h5>Listado de reporte de fugas</h5>
                    <div id="lstReporte"></div>
                    <h5>Asignar Cuadrilla</h5>
                    <select id="cuadrilla" name="cuadrilla" class="form-control">
                        <option value="cuadrilla_1">Cuadrilla 1</option>
                        <option value="cuadrilla_2">Cuadrilla 2</option>
                        <option value="cuadrilla_3">Cuadrilla 3</option>
                        <option value="cuadrilla_4">Cuadrilla 4</option>
                        <option value="cuadrilla_5">Cuadrilla 5</option>
                    </select>
                    <div class="d-flex flex-column mt-1">
                        <button id="btn-crear_orden" class="btn btn-primary btn-sm"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Asignación de cuadrilla</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="js/orden/functions.js"></script>
<script type="text/javascript" src="js/orden/events.js"></script>
<script type="text/javascript" src="js/orden/main.js"></script>
@endsection
