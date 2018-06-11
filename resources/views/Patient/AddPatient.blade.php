@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Patient Register
@endsection

@section('OuterInclude')

@endsection
<style>
    body{
        background: url("picture/111.jpg") fixed center;
    }
</style>

@section('ContentOfBody')
    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 style="text-align:center">Patient Register</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('PatientAdd.Submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                <label for="fname" class="col-md-4 control-label"> First Name</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>

                                    @if ($errors->has('fname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                <label for="lname" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required >

                                    @if ($errors->has('lname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="Male" @if( old('gender')=="Male") selected @endif>Male</option>
                                        <option value="Female"  @if( old('gender')=="Female") selected @endif >Female</option>
                                        <option value="Other"  @if( old('gender')=="Other") selected @endif >Other</option>
                                    </select>
                                </div>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Mobile</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required >

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                <label for="age" class="col-md-4 control-label">Age</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" min="0" max="200" class="form-control" name="age" value="{{ old('age') }}" required >

                                    @if ($errors->has('age'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
