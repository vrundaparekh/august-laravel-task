@extends('layouts.admin')
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Movies</h1>
    

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Create Movies</h6>
             
         <div class="card-body text-center">
             <div class="col-md-6">
                <form class="user" id="movie-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="movie_name"
                                placeholder="{{ __('movie_name') }}" name="movie_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <textarea name="description" id="description" class="form-control form-control-user" placeholder="{{ __('description') }}"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="youtube_url" placeholder="{{ __('youtube_url') }}" name="youtube_url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="release_date" placeholder="{{ __('release_date') }}" name="release_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="slug" placeholder="{{ __('slug') }}" name="slug" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="file" class="form-control form-control-user dropify" id="image" placeholder="{{ __('image') }}" name="image">
                        </div>
                    </div>
                    <div class="form-group row text-left">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <button class="btn btn-primary" >Submit</button>
                        </div>
                    </div>
                    
                    
                   
                    
                </form>
             </div>
         </div>
     </div>
@endsection
@section('script')
    <script>
        duDatepicker('#release_date');
        $('.dropify').dropify();
        $('#movie_name').on('keyup', function(){
            var str = $('#movie_name').val();
            $('#slug').text('');
            var slug =  str.toLowerCase()
            .replace(/ /g, "-")
            .replace(/[^\w-]+/g, "");
            $('#slug').val(slug);
        });
        $("#movie-form").validate({
                rules: {
                    movie_name: { required: true },
                    description: {
                          required: true,
                      },
                    youtube_url : { required: true},
                    release_date : { required: true},
                    image : { required: true}
                },
                messages: {
                    movie_name: { required: "The movie name is required." },
                    description: {required: "The description field is required."},
                    youtube_url: {required: "The url field is required."},
                    release_date: {required: "The release date is required."},
                    image: {required: "The image field is required."},
                },
                errorElement: 'span',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                  var form_data = new FormData($('#movie-form')[0]);
                  var file_data = $('#image').prop('files')[0];
                  form_data.append('image',file_data);
                  $.ajax({
                            type: "post",
                            url: "{{route('movie.store')}}",
                            data: form_data,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            statusCode:{
                                422:function(xhr){
                                    $.each(xhr.responseJSON.error, function (k, v) { 
                                        $.toast({
                                                heading: 'error',
                                                text : v ,
                                                position: 'top-right',
                                                icon: 'error',
                                                position: {
                                                    right: 10,
                                                    top: 90
                                                }
                                            });
                                        
                                  });
                                    
                                },
                                200:function(xhr){
                                    $.toast({
                                            heading: 'success',
                                              text : xhr.message,
                                              position: 'top-right',
                                              icon: 'success',
                                              position: {
                                                  right: 10,
                                                  top: 90
                                              }
                                          });
                                    setTimeout(function(){
                                                  window.location.href = "{{route('movie.index')}}";
                                              }, 3000);
                                  }
                              }
                          });
                }
            });
    </script>
@endsection