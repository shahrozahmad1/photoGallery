@extends('layouts.app')
@section('content')

 <div class="jumbotron">
     <h1>Welcome to the laravel Photo Gallery</h1>
     <p>After using this photo gallery, you have to register yourself and after that login to be able to create galleries and upload photos.</p>
 </div>
 <div class="grid">
    <!-- width of .grid-sizer used for columnWidth -->
    <div class="grid-sizer"></div>
    <div class="grid-item"></div>
    <div class="grid-item grid-item--width2"></div>
    ...
  </div>
 <div>
    .grid-sizer,
    .grid-item { width: 20%; }
    /* 2 columns */
    .grid-item--width2 { width: 40%; }

 $('.grid').masonry({
    // set itemSelector so .grid-sizer is not used in layout
    itemSelector: '.grid-item',
    // use element for option
    columnWidth: '.grid-sizer',
    percentPosition: true
  });
</div>
    
@endsection