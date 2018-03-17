@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    View Patient
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/view_patient.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('js/view_patient.js') }}"></script> --}}
@endsection


@section('ContentOfBody')
    {{-- Main Profile View --}}
    <div class="container">
        <div class=" col-sm-12 pro_head clearfix">
            <h2 class="pull-left"> <strong>{{ $Personal->fname}}'s</strong> Profile</h2>
            <h2 class="pull-right">
                @if(Auth::guard('patient')->check() && Auth::guard('patient')->user()->id == $Personal->id )
                    <a href="{{ route('PatientEdit')}}" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                @endif
            </h2>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-3" align="center">
            <img src="{{ asset($Personal->img) }}" class="img-thumbnail" alt="Profile Pic" width="200" height="200">
            <p class="cls_phn_num"> <span class="glyphicon glyphicon-phone-alt" style="color: #357ed3;"></span>{{$Personal->phone}}</p>
        </div>
        <div class="col-sm-6 ">

            <div class="pro-info">
                <table class="table info_table">
                    <tbody>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td> <strong>{{$Personal->fname.' '.$Personal->lname}}</strong></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>{{$Personal->gender}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{$Personal->email}}</td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>{{$Personal->age}}</td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td>{{$Personal->phone}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- This Section For COntest Log --}}
    <div class="container">
        <div class="col-sm-12 pro_head">
            <h2>Your Activity</h2>
        </div>
        <div class="col-sm-12 contest_table">
            <table class="table contest_info_table">
                <thead>
                <tr>
                    <td>Date</td>
                    <td>Doctor</td>
                    <td>Position</td>
                    <td>Code</td>
                </tr>
                </thead>

                <tbody>

                <tr>
                    <td>2018-12-03</td>
                    <td><a style=" color:black;" href="#">Related Doctor</a></td>
                    <td>12</td>
                    <td>wqeqweqwewqe</td>
                </tr>

                <tr>
                    <td>2018-12-03</td>
                    <td><a style=" color:black;" href="#">Related Doctor</a></td>
                    <td>12</td>
                    <td>wqeqweqwewqe</td>
                </tr>

                <tr>
                    <td>2018-12-03</td>
                    <td><a style=" color:black;" href="#">Related Doctor</a></td>
                    <td>12</td>
                    <td>wqeqweqwewqe</td>
                </tr>

                {{--<tr>--}}
                {{--<td>{{$val->date->serial_date}}</td>--}}
                {{--<td><a style=" color:black;" href="{{route('Doc.View', ['id' => $val->date->doctor])}}">Related Doctor</a></td>--}}
                {{--<td>{{$val->position}}</td>--}}
                {{--<td>{{$val->code}}</td>--}}
                {{--</tr>--}}


                {{--@foreach($Activity as $val)--}}
                    {{--<tr>--}}
                        {{--<td>{{$val->date->serial_date}}</td>--}}
                        {{--<td><a style=" color:black;" href="{{route('Doc.View', ['id' => $val->date->doctor])}}">Related Doctor</a></td>--}}
                        {{--<td>{{$val->position}}</td>--}}
                        {{--<td>{{$val->code}}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}

                </tbody>

            </table>

            </br>
            </br>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection