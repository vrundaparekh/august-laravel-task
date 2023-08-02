@extends('layouts.front')
@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $movies[0]['movie_name']}}</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

 

    <!-- Content Row -->

  

    <!-- Content Row -->
    <div class="row">
        @foreach ($movies as $m)
        @php
        $url = $m->youtube_url;
        $embedUrl = str_replace("watch?v=","embed/",$url);    
    @endphp
        <!-- Content Column -->
        <a href="{{route('movie.name',$m->slug)}}" class="text-decoration-none">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <img src="{{ url($m->image) }}" width="400" height="200" />
                <h6 class="mt-2 font-weight-bold text-primary text-left">{{ ucfirst($m->movie_name) }}</h6>
            </div>
            <div class="card-body w-100 text-black-50">
               {!! $m->description !!}
            </div>
            <div class="card-body w-100">
                <iframe width="1200" height="400" src="{{$embedUrl}}">  </iframe>
             </div>
        </div>
        </a>
        @endforeach
    

        
    </div>
@endsection