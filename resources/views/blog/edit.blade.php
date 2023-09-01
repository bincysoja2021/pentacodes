@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="pull-left my-2">
                    <h2>Edit Blog</h2>
                </div>
                <div class="pull-right my-2">
                    <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                </div>
                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{ route('update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:<span class="text-danger">*</span></strong>
                                <textarea type="text" name="title" id="title" class="form-control" placeholder="title" autocomplete="off">{{$blog->title}}
                                </textarea>
                                @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sub Title:<span class="text-danger">*</span></strong>
                                 <textarea type="text" name="subtitle" id="subtitle" class="form-control" placeholder="subtitle" autocomplete="off">{{$blog->subtitle}}
                                </textarea>
                                @error('subtitle')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                 <input type="file" name="image" id="image" class="form-control">
                                 <img src=" {{ $blog->image }}" style="width: 10%">
                                 
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>status:<span class="text-danger">*</span></strong>
                                <select name="status" id="status" class="form-control">
                                <option value='active' {{ ($blog->status == "active") ? 'selected' : '' }}>Active</option>
                                <option value='inactive'{{ ($blog->inactive == "active") ? 'selected' : '' }} >In-Active</option>
                            </select>
                                @error('status')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>  

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:<span class="text-danger">*</span></strong>
                                 <textarea type="text" name="description"  id="description" class="form-control" placeholder="Description" autocomplete="off">{{$blog->description}}
                                </textarea>
                                @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>              
                        
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
