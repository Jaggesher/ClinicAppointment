@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
    Home
@endsection

@section('OuterInclude')

    {{-- <script src="{{ asset('js/profile_update.js') }}"></script> --}}
@endsection
@section('ContentOfBody')
  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="https://images.unsplash.com/photo-1418489098061-ce87b5dc3aee?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2f033882f3c25404e3f904fbfe2351be&w=1000&q=80" alt="Los Angeles" style="width:100%;">
        </div>
  
        <div class="item">
          <img src="https://images.unsplash.com/photo-1418489098061-ce87b5dc3aee?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2f033882f3c25404e3f904fbfe2351be&w=1000&q=80" alt="Chicago" style="width:100%;">
        </div>
      
        <div class="item">
          <img src="https://images.unsplash.com/photo-1418489098061-ce87b5dc3aee?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2f033882f3c25404e3f904fbfe2351be&w=1000&q=80" alt="New york" style="width:100%;">
        </div>
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

@endsection

