
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 jQuery Validation Example Tutorial - Tutsmake.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <style>
    .error{
     color: #FF0000; 
    }
  </style>
</head>
<body>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="row gy-5">
                <div class="col-12">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                    </div>
                </div>
                <div class="col-12 my-5">
                    <div class="card">
                        <div class="card-header text-center font-weight-bold">
                          <h2>Add Blog</h2>
                        </div>
                        <div class="card-body">
                          <form name="blog-add" id="blog-add" method="post" action="{{url('store')}}" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Title</label>
                              <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror form-control">
                              @error('title')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>   
                            <div class="form-group">
                              <label for="exampleInputEmail1">Sub-Title</label>
                              <input type="text" id="subtitle" name="subtitle" class="@error('subtitle') is-invalid @enderror form-control">
                              @error('subtitle')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>   
                            <div class="form-group">
                              <label for="exampleInputEmail1">Image</label>
                              <input type="file" id="image" name="image" class="form-control">
                              @error('image')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div> 

                            <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                              <select name="status" id="status" class="@error('status') is-invalid @enderror form-control">
                                <option value='active'>Active</option>
                                <option value='inactive'>In-Active</option>
                            </select>
                              @error('status')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>       
                            <div class="form-group">
                              <label for="exampleInputEmail1">Description</label>
                              <textarea type="text" id="description" name="description" class="@error('description') is-invalid @enderror   form-control" required></textarea>
                              @error('description')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>    
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<script>
    if ($("#blog-add").length > 0) {
        $("#blog-add").validate({
  
            rules: {
                title: {
                    required: true,
                    maxlength: 50
                },
                subtitle: {
                    required: true,
                    maxlength: 50
                },
                status: {
                    required: true
                },
                description:{
                    required:true
                },
            },
            messages: {
  
                title: {
                    required: "Please enter title",
                },
                subtitle: {
                    required: "Please enter sub-title",
                },
                status: {
                    required: "Please select status",
                },
                description: {
                    required: "Please enter the description",
                },
            },
        })
    } 
 </script>
 <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

</body>
</html>