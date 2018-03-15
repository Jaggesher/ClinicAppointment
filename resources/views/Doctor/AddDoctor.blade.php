@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Doctor
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/add_doctor.css') }}" rel="stylesheet">
    <script src="{{ asset('js/add_doctor.js') }}"></script>
@endsection


@section('ContentOfBody')
    {{-- Main Add Doctor View --}}
    <div class="container">
        <div class=" col-sm-12 add_doc_head">
            <h2>New Doctor.</h2>
        </div>
        <br>
        <br>
        <div class="col-sm-8 col-sm-offset-2">
            <div class="jumbotron">
                <form class="form-horizontal" role="form" method="post" action="{{route('DocAdd.Submit')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="name" placeholder="Doctor's Name"  value="{{ old('name') }}" maxlength="49" required autofocus >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('sort_msg') ? ' has-error' : '' }}">
                        <label class="col-lg-3 control-label">Short Message:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="sort_msg" placeholder="Sort Message" value="{{ old('sort_msg') }}" maxlength="149" required >
                            @if ($errors->has('sort_msg'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('sort_msg') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                        <label class="col-lg-3 control-label">Category:</label>
                        <div class="col-lg-8">
                            <select class="form-control selectpicker" name="category" title="Choose one of the following..." required>
                                @foreach($Categories as $category)
                                    <option value="{{$category->Category}}">{{$category->Category}}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('category'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
                        <label class="col-lg-3 control-label">District:</label>
                        <div class="col-lg-8">
                            <select class="form-control selectpicker" name="district" title="Choose one of the following..." required>
                                @foreach($Districts as $district)
                                <option value="{{$district->district}}">{{$district->district}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-lg-3 control-label">description:</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" rows="8" placeholder="About Doctor." name="description" required>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
                        <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                             @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" value="" name="password" placeholder="Enter Password" required>
                            @if ($errors->has('password'))
                                <br>
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Confirm password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" value="" name="password_confirmation" placeholder="Confirm Password" required>
                            @if ($errors->has('password'))
                                <br>
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Add Doctor">
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>
@endsection