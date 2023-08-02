@extends('layouts.admin')
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Movies</h1>
    

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Movies</h6>
             <div class="text-right"><a href="{{route('movie.create')}}"><button class="btn btn-primary">Add Movies</button></a></div>
            </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>Movie Name</th>
                             <th>Description</th>
                             <th>Image</th>
                             <th>Release Date</th>
                             <th>URL</th>
                         </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $m)
                            @php
                                $url = $m->youtube_url;
                                $embedUrl = str_replace("watch?v=","embed/",$url);    
                            @endphp
                            <tr>
                                <td>{{$m->movie_name}}</td>
                                <td>{!! $m->description !!}</td>
                                <td><img src="{{ url($m->image) }}" width="100" height="100" /></td>
                                <td>{{$m->release_date}}</td>
                                <td> <iframe width="320" height="215"
                                    src="{{$embedUrl}}">
                                    </iframe> </td>
                            </tr>
                            @endforeach
                        </tbody>
                     <tfoot>
                         <tr>
                            <th>Movie Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Release Date</th>
                            <th>URL</th>
                         </tr>
                     </tfoot>
                 </table>
             </div>
         </div>
     </div>
@endsection