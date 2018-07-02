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
  <br>
  <br>
    <h1 class="text-center" style="color: white;"> <b> WELCOME TO DOCTOR APPOINTMENT SYSTEM</b></h1>
    <hr>
    <br>
    
    <p class="text-center" style="font-size: 40px; color: #FAFAFA">
      <marquee>Find and Book a Doctor Appointment right now</marquee>
    </p>
</div>

@endsection

