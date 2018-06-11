@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Admin Add
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/AdminAdd.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('js/view_patient.js') }}"></script> --}}
@endsection
<style>
    body{
        background: url("picture/1.jpg") fixed center;
    }
</style>

@section('ContentOfBody')
    {{-- Main Profile View --}}
    <div class="container">
        <div class=" col-sm-12 pro_head clearfix">
            <h2> <strong>Add Or Delete</strong> Category</h2>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <table class="table well">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @php
                    $i=1
                @endphp

                @foreach($Categories as $category)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$category->Category}}</td>
                        <td>
                            <form action="{{ route('DeleteCategory') }}" method="post">
                                {{ csrf_field() }}
                                <input name="id" value="{{$category->Category}}" type="hidden" >
                                <button class="btn btn-default">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @php
                        $i+=1;
                    @endphp
                @endforeach

                </tbody>
            </table>
            <div class="panel panel-default">
                <div class="panel-heading">Add Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('NewCategory.Submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label"> New Category</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required autofocus>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class=" col-sm-12 pro_head clearfix">
            <h2> <strong>Add Or Delete</strong> Districts</h2>
        </div>

        <div class="col-md-8 col-md-offset-2">

            <table class="table well">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>District</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1
                @endphp

                @foreach($Districts as $district)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$district->district}}</td>
                        <td>
                            <form action="{{ route('DeleteDistrict') }}" method="post">
                                {{ csrf_field() }}
                                <input name="id" value="{{$district->district}}" type="hidden" >
                                <button class="btn btn-default">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i+=1;
                    @endphp
                @endforeach

                </tbody>
            </table>

            <div class="panel panel-default">
                <div class="panel-heading">Add District</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('NewDistrict.Submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                            <label for="district" class="col-md-4 control-label"> New District</label>

                            <div class="col-md-6">
                                <input id="district" type="text" class="form-control" name="district" value="{{ old('district') }}" required>

                                @if ($errors->has('district'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection