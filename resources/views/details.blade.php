@extends('layouts.app')
@section('title',"Sanborns")
@section('content')


    <div class="row">
        <div class="col-md-1 bg-light"></div>
        <div class="col-md-5 bg-light"><h1><b>Detalles de cuenta </b></h1></div>
        <div class="col-md-5"></div>
        <div class="col-md-1 bg-light"></div>
    </div>
    <div class="row">
        <div class="col-md-2 bg-light"></div>
        <div class="col-md-8 bg-light">
            @if(isset($details))
                @include('tables.results_details')
            @endif
        </div>
        <div class="col-md-2 bg-light"></div>
    </div>
    <div class="row">
        <div class="col-md-9 bg-light"></div>
        <div class="col-md-2 bg-light">
            <button type="button" class="btn btn-primary btn-lg" >REGRESAR</button>
        </div>
        <div class="col-md-1 bg-light"></div>
    </div>


@endsection


