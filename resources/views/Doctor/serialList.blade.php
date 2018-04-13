@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Doctor
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/serial.css') }}" rel="stylesheet">
@endsection


@section('ContentOfBody')
    <div class="container">
        <div class=" col-sm-12 add_doc_head clearfix">
            <h2 class="pull-left">Serial List View</h2>
        </div>

        <div class="col-sm-8 col-sm-offset-2">
            <div class="well">
                <div align="center">


                    <img src="{{ asset($Doctor->img)}}" class="img-thumbnail" alt="Profile Pic" width="200"
                         height="200">
                    <div class="docInfo">
                        <h2><strong><i>Name: </i></strong>{{$Doctor->name}}</h2>
                        <h3><strong><i>Category: </i></strong>{{$Doctor->category}}</h3>
                        <h4><strong><i>Date: </i></strong> {{$Date->serial_date}}</h4>
                        <h4><strong><i>Start Time: </i></strong> {{$Date->start_time}}</h4>
                        <h4><strong><i>End Time: </i></strong> {{$Date->end_time}}</h4>
                        <p><strong><i>Chamber: </i> </strong>{{$Date->chember}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-sm-12 add_doc_head clearfix">
            <h4 class="pull-left">Related Serials.</h4>
        </div>

        <div class="col-sm-12 well">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>From:</th>
                        <th>To:</th>
                        <th>Patient</th>
                    </tr>
                </thead>
                <tbody>

                @if($Serials != null)
                    @php
                        $i=1;
                    @endphp
                    @foreach($Serials as $serial)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$serial->start_time}}</td>
                            <td>{{$serial->end_time}}</td>
                            @if($serial->patient != null)
                                <td><a href="{{route('ViewPatient', ['id' => $serial->patient])}}">Related Patient</a>
                                </td>
                            @else
                                <td>N/A</td>
                            @endif;
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @else
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                @endif


                </tbody>
            </table>
        </div>
    </div>
@endsection