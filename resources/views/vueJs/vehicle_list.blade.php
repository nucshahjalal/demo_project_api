@extends('backend.app')
@section('page_title','Vehicle List')
@section('content')

@vite('resources/js/app.js')

<div id="vehicleListVue">

</div>

@endsection

<script>
window.vehicles = @json($datas);
</script>