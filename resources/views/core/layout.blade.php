<!DOCTYPE html>
<html lang="es">
<head>
    <title>SACMEX CDMX</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/themes/css/cartodb.css" />
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/leaflet.draw.css" rel="stylesheet"/>
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/css/maps.css" rel="stylesheet">
    @yield('css')
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            @include("core/header")
            @yield('toolbar')
            <div class="container-fluid m-0 p-0">
                <div class="row">
                    @yield('contents')
                </div>
            </div>
            @include("core/footer")
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript" src="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/cartodb.js"></script>
    <script type="text/javascript" src="/js/common/leaflet.draw.js"></script>
    <script type="text/javascript" src="/js/common/turf.min.js"></script>
    <script type="text/javascript" src="/js/common/underscore-min.js"></script>
    <script type="text/javascript" src="/js/common/cdmxCarto.js"></script>
    @yield('scripts')
</body>
</html>
