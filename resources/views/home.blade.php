@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            @foreach ($galleries as $gallery)
            <div class="col-md-3">
                <a href="{{route('galleryShow', $gallery->id)}}">
                <img src="{{asset('public/galleries/' .$gallery->cover)}}" alt="cover" width="150px">
                <p class="">{{$gallery->title}}</p>
                </a>
            </div>
            @endforeach
        </div>

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                 
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <h1 class="card-header">Galleries</h1>
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700"></p>
            </div>
         <div class="col md 3">
            <div class="card">
                <div class="card-header">Create New Gallery</div>
                <div class="card-body">
                <a href="{{route('galleryCreate')}}" class="btn btn-success btn-block">Create New Gallery</a>
                  </div>
                 </div>
         </div>
        </section>
    </div>
</main>
@endsection
