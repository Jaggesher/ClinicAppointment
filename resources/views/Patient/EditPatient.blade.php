@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Update Doctor
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/edit_patient.css') }}" rel="stylesheet">
    <script src="{{ asset('js/edit_patient.js') }}"></script>
@endsection


@section('ContentOfBody')
    {{-- Main Profile View --}}
    <div class="container">
        <div class=" col-sm-12 pro_head">
            <h2>Update Profie</h2>
        </div>

        <div class="col-sm-4 pro_image" align="center">
            <h4>Current Profile Picture.</h4>
            <img  id="ProPicUp" src="{{ asset($Personal->img) }}" class="img-thumbnail clearfix" alt="Profile Pic" width="200" height="200">
            <form action="{{route('PatientEditPic.Submit')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="file" accept="image/jpg, image/jpeg, image/png" required>
                </div>

                <div class="input-group" style="width:220px;">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                    <input id="displayFileName" type="text" class="form-control" value="" readonly placeholder="Upload Image">
                    <span class="input-group-btn">
                    <button class="browse btn btn-primary" type="button"><i class="glyphicon glyphicon-folder-open"></i></button>
                </span>
                </div>

                <button id="SavePropic" class="btn btn-primary " type="submit" style="width:220px;"><i class="glyphicon glyphicon-ok-sign"></i> Set as Profile</button>
            </form>

            @if ($errors->has('fileToUpload'))
                <div class="alert alert-danger">
              <span class="help-block">
                  <strong>{{ $errors->first('fileToUpload') }}</strong>
              </span>
                </div>
            @endif
            @if (Session::has('wrong'))
                <div class="alert alert-danger">
              <span class="wrong">
                <strong> {{ Session::get('wrong') }}</strong>
              </span>
                </div>
            @endif

        </div>

        <div class="col-sm-8 pro_info">
            @if(count($errors) > 0 || Session::has('no_match'))
                <div id="errMsg">
                    <button id="fail" type="button" class="pull-right alert-danger"><span class="glyphicon glyphicon-remove alert-danger"> </span></button>
                    <p style="margin-bottom: 3px; text-align: center;" class="alert alert-danger fail"><strong>FAIL</strong>, Please fill information correctly.</p>
                </div>
            @endif
            <h3 style="margin-bottom: 3px;">Update Your Personal info </h3>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#basic">Basic</a></li>
                <li><a data-toggle="tab" href="#pass">Password</a></li>
            </ul>

            <div class="tab-content">
                <div id="basic" class="tab-pane fade in active">
                    <br>
                    <form class="form-horizontal" role="form" method="post" action="{{route('PatientEdit.Submit')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">


                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="fname" class="col-md-3 control-label"> First Name</label>

                            <div class="col-md-8">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ $Personal->fname }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-3 control-label">Last Name</label>

                            <div class="col-md-8">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ $Personal->lname}}" required >

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{-- {{ $errors->has('email') ? ' has-error' : '' }} --}}">
                            <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $Personal->email }}" readonly>

                                {{-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                            <label for="gender" class="col-md-3 control-label">Gender</label>

                            <div class="col-md-8">
                                <select class="form-control" id="gender" name="gender">
                                    <option value="Male" @if( $Personal->gender=="Male") selected @endif>Male</option>
                                    <option value="Female"  @if( $Personal->gender=="Female") selected @endif >Female</option>
                                    <option value="Other"  @if( $Personal->gender=="Other") selected @endif >Other</option>
                                </select>
                            </div>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-3 control-label">Mobile</label>

                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{  $Personal->phone }}" required >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-3 control-label">Age</label>

                            <div class="col-md-8">
                                <input id="age" type="number" min="0" max="200" class="form-control" name="age" value="{{  $Personal->age }}" required >

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Update Profile">
                                <span></span>
                                {{-- <input type="reset" class="btn btn-default" value="Cancel"> --}}
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>


                <div id="pass" class="tab-pane fade">
                    <br>
                    <form class="form-horizontal" role="form" method="post" action="{{route('PatientEditPass.Submit')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }} @if(Session::has('no_match')) has-error @endif">
                            <label class="col-md-3 control-label">Old Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="" name="old_password" placeholder="Enter Old Password" required>
                                @if ($errors->has('old_password'))
                                    <br>
                                    <span class="help-block">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                                @endif
                                @if (Session::has('no_match'))
                                    <br>
                                    <span class="help-block">
                                <strong> {{ Session::get('no_match') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="" name="password" placeholder="Enter New Password" required>
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
                                <input class="form-control" type="password" value="" name="password_confirmation" placeholder="Confirm New Password" required>
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
                                <input type="submit" class="btn btn-primary" value="Update Password">
                                <span></span>
                                {{-- <input type="reset" class="btn btn-default" value="Cancel"> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection