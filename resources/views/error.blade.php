@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Error
@endsection

@section('OuterInclude')

@endsection


@section('ContentOfBody')
    <div class="container text-center">
        <div class="alert alert-danger" style="margin-top: 30vh;">
            <strong>Sorry!</strong> We can't find any thing.
        </div>
    </div>

@endsection