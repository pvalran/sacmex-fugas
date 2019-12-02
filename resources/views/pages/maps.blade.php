
@extends("core/layout")
@section("css")
<link rel="stylesheet" href="/css/pages/maps/main.css">
@endsection
@section("content")
    <div id="divMapMain">
        @include("widget/panel")
    </div>
@endsection
@section("scripts")
<script type="text/javascript" src="js/pages/maps/functions.js"></script>
<script type="text/javascript" src="js/pages/maps/events.js"></script>
<script type="text/javascript" src="js/pages/maps/main.js"></script>
@endsection
