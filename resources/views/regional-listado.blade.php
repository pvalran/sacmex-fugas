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
<div class="col-12">
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-sm-4 col-md-4">
            <div class="card border-left-primary">
                <div class="card-body m-1 p-0">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Por asignar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-sm-4 col-md-4 mb-4">
            <div class="card border-left-success">
                <div class="card-body m-1 p-0">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Asignadas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-sm-4 col-md-4 mb-4">
            <div class="card border-left-info">
                <div class="card-body m-1 p-0">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Concluidas</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary">Ordenes de trabajo</h6>
        </div>
        <div class="card-body">
            <table id="dataOrden" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Ticket</th>
                    <th>Fecha de registro</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Asignar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="/js/regionallistado/functions.js"></script>
<script type="text/javascript" src="/js/regionallistado/events.js"></script>
<script type="text/javascript" src="/js/regionallistado/main.js"></script>
@endsection
