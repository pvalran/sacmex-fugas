@extends('core.layout')
@section('css')
<script type="text/template" id="itemOrden">
    <div data-carto="<%- item.cartodb_id %>" class="card">
        <div class="card-body">
            <h6 class="card-title"><strong>Numero de orden:&nbsp;<%- item.ticket %></strong></h6>
            <h5 class="card-subtitle">Fecha registro:&nbsp;<%- item.fecha_registro %></h5>
            <p class="card-text"><%- item.direccion %></p>
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
                        <div class="col-xs-8 col-sm-8 col-md-8 flex-row align-self-end px-0" style="z-index: 1;margin-bottom: 94px;">
                            <div id="pnlReportFuga">Posicion</div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 px-0" style="height: 100%;">
                            <div class="card border-left-primary panel-Ubicacion">
                                <div class="card-body flex-column">
                                    <h5>Datos de orden</h5>
                                    <div id="lstOrden"></div>
                                    <h5>Asignar Cuadrilla</h5>
                                    <select id="cuadrilla" name="cuadrilla" class="form-control">
                                        <option value="1">Cuadrilla 1</option>
                                        <option value="2">Cuadrilla 2</option>
                                        <option value="3">Cuadrilla 3</option>
                                        <option value="4">Cuadrilla 4</option>
                                        <option value="5">Cuadrilla 5</option>
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
<script type="text/javascript" src="/js/orden/functions.js"></script>
<script type="text/javascript" src="/js/orden/events.js"></script>
<script type="text/javascript" src="/js/orden/main.js"></script>
@endsection
