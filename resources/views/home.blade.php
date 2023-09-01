@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <p align="right">
        <a href="{{ route('add') }}"><button type="button" class="btn btn-warning">Add Blog</button></a></p>
        <br></br>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($blog as $data)
          <div class="col">
            <div class="card">
              <img src="{{ $data->image }}" style="width: 100%" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>{{ ucfirst($data->title) }}</b></h5>
                <p class="card-text"><b>{{ $data->subtitle }}</b></p>
                 <p class="card-text">{{ Illuminate\Support\Str::limit($data->description, 20) }}</p>
                 <a href="{{ route('read_more',$data->id) }}"><button type="button" class="btn btn-success">Read More</button></a>
                <br></br>
                  <td>
                        <form action="{{ route('blog_destroy',$data->id) }}" method="Post">
                            <a class="btn btn-secondary" href="{{ route('edit',$data->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </td>
              </div>
            </div>
          </div>
          @endforeach
          {!! $blog->links() !!}
 
      </div>
    </div>
</div>
@endsection
