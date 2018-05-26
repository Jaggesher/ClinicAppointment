@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Doctor
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/view_doctor.css') }}" rel="stylesheet">
    <script src="{{ asset('js/view_doctor.js') }}"></script>
@endsection


@section('ContentOfBody')
    <div class="container">
        <div class=" col-sm-12 add_doc_head clearfix">
            <h2 class="pull-left">{{$Personal->name}}</h2>
            <h2 class="pull-right">
                @if(Auth::guard('doctor')->check() && Auth::guard('doctor')->user()->id == $Personal->id )
                    <a href="{{ route('DocEdit')}}" data-toggle="tooltip" data-placement="bottom" title="Edit"><span
                                class="glyphicon glyphicon-edit"></span></a>
                @endif
            </h2>
        </div>

        <div class="row">
            <div class="col-sm-3" align="center">
                <img src="{{ asset($Personal->img) }}" class="img-thumbnail" alt="Profile Pic" width="200" height="200">
                <p class="cls_sort_msg"> {{$Personal->sort_msg}}</p>
                @if(Auth::guard('web')->check())
                    <form method="post" action="{{ route('DeleteDoctor') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="DoctorId" value="{{$Personal->id}}">
                        <input type="submit" class="btn btn-danger" value="Delete This Doctor">
                    </form>
                @endif
            </div>
            <div class="col-sm-9">
                <div class="pro-info">
                    <table class="table info_table">
                        <tbody>
                        <tr>
                            <td><strong>Category:</strong></td>
                            <td><strong>{{$Personal->category}}</strong></td>

                        </tr>
                        <tr>
                            <td>District:</td>
                            <td>{{$Personal->district}}</td>
                        </tr>
                        <tr>
                            <td>Doctor's Email:</td>
                            <td>{{$Personal->email}}</td>
                        </tr>

                        </tbody>
                    </table>

                    <div class="doc-desc-cls">
                        <h1>About:</h1>
                        <p class="doc-description">{{$Personal->description}}</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    @if(Auth::guard('doctor')->check() && Auth::guard('doctor')->user()->id == $Personal->id)
        <div class="container">
            <div class="col-sm-12 add_doc_head clearfix">
                <h2 class="pull-left">Activity</h2>
                <h2 class="pull-right">
                    <button id="addDateBtn" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>
                    </button>
                </h2>
            </div>

            <div class="col-md-8 col-sm-offset-2" id="addDateBlock"
                 @if(count($errors) == 0 && !Session::has('Already_added')) style="display:none;" @endif>
                <div class="panel panel-default">
                    <div class="panel-heading">Add Another Date.</div>
                    <div class="panel-body">
                        <p class="alert alert-danger"><strong>Alert!!!!</strong> <br> &nbsp &nbsp Be serious about the
                            date. Once you add it then it never undo. So you must be over sure about the date.<br>&nbsp&nbsp&nbsp
                            ----Thank You. :) </p>
                        <form class="form-horizontal" method="POST" action="{{ route('AddDate.Submit') }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="doctor" value="{{$Personal->id}}">

                            <div class="form-group{{ $errors->has('serial_date') || Session::has('Already_added') ? ' has-error' : '' }}">

                                <label for="serial_date" class="col-md-4 control-label">Enter Date</label>
                                <div class="col-md-6">
                                    <input id="serial_date" type="date" class="form-control" name="serial_date"
                                           value="{{ old('serial_date') }}" required>

                                    @if ($errors->has('serial_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('serial_date') }}</strong>
                                        </span>
                                    @endif

                                    @if (Session::has('Already_added'))
                                        <span class="help-block">
                                             <strong> {{ Session::get('Already_added') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('start_time') ? ' has-error' : '' }}">
                                <label for="start_time" class="col-md-4 control-label">Start Time: </label>
                                <div class="col-md-6">
                                    <input id="start_time" type="time" class="form-control" name="start_time"
                                           value="{{ old('start_time') }}" required>

                                    @if ($errors->has('start_time'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('end_time') ? ' has-error' : '' }}">
                                <label for="end_time" class="col-md-4 control-label">End Time: </label>
                                <div class="col-md-6">
                                    <input id="end_time" type="time" class="form-control" name="end_time"
                                           value="{{ old('end_time') }}" required>

                                    @if ($errors->has('end_time'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('minute_for_each') ? ' has-error' : '' }}">
                                <label for="minute_for_each" class="col-md-4 control-label">Minnute For Each: </label>
                                <div class="col-md-6">
                                    <input id="minute_for_each" type="number" min="20" max="60" class="form-control"
                                           name="minute_for_each" value="{{ old('minute_for_each') }}" required>

                                    @if ($errors->has('minute_for_each'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('minute_for_each') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('chember') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Chember:</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="8" placeholder="chember address."
                                              name="chember" required>{{ old('chember')}}</textarea>
                                    @if ($errors->has('chember'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('chember') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Date
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="col-sm-12 well">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Chamber</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($Dates != null)
                    @foreach($Dates as $date )
                        <tr>
                            <td>{{$date->serial_date}}</td>
                            <td>{{$date->start_time}}</td>
                            <td>{{$date->end_time}}</td>
                            <td>{{$date->chember}}</td>
                            <td>
                                <a href="{{route('bookSerial', ['id' => $date->id])}}" class="btn btn-success">Book
                                    Serial</a>
                                @if(Auth::guard('doctor')->check() && Auth::guard('doctor')->user()->id == $Personal->id )
                                    <a href="{{route('serial.lsit', ['id' => $date->id])}}" class="btn btn-primary">See
                                        List</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>
                            <button class="btn, btn-primary">addSerial</button>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            <hr>
            <div id='calendar'></div>
        </div>
    </div>


    </div>

    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                navLinks: false, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    @foreach($Dates as $date )
                        {
                            title: '{{$date->chember}}',
                            start: '{{$date->serial_date}}T{{$date->start_time}}',
                            end: '{{$date->serial_date}}T{{$date->end_time}}'
                        },
                    @endforeach
                ]
            });
        });

    </script>

@endsection