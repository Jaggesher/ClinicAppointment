@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Home
@endsection

@section('OuterInclude')

    {{-- <script src="{{ asset('js/profile_update.js') }}"></script> --}}
@endsection


@section('ContentOfBody')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome Home
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

