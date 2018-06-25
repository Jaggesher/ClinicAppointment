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
    <h1 class="text-center" style="color: white;"> <b> WELCOME</b></h1>
    <hr>
    <br>
    
    <p class="text-center" style="font-size: 20px; color: #FAFAFA">
      this is some text 
    </p>
</div>

@endsection

