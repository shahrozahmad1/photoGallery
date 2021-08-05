@extends('layouts.app')
@section('content')
      <div class="row justify-content-center">
          <div class="col-md-3">
              <div class="card">
                  <div class="card-header">Actions</div>
                  <div class="card-body">
                      <a href="" class="btn btn-success btn-block">Edit Photo</a>
                      <a href="" class="btn btn-danger btn-block">Delete Photo</a>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">{{$photo->title}}</div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">{{$photo->description}}</div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <img src="{{asset('/public/galleries/photos' .$photo->photo)}}" alt="photo" width="100%">
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
    
@endsection