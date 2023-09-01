@extends('layouts.app')
<style>
.content {
  max-width: 950px;
  margin: auto;
  padding: 50px;
}
</style>
@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="row gy-5">
          <div class="col-12">
            <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
          </div>
          <div class="col-12 my-5">
            <div class="card" style="text-align: center;">
              <div class="row justify-content-center my-2">
                <div class="col">
                  <img src="{{ $blog->image }}" style="width: 50%" class="" alt="...">
                </div>
              </div>
              <div class="card-body">
                <h5 class="card-title"><b>{{ ucfirst($blog->title) }}</b></h5>
                <p class="card-text"><b>{{ $blog->subtitle }}</b></p>
                 <p class="card-text">{!! $blog->description !!}</p>
                 <p style="color:red"><b>Created at: {{$blog->created_at}}</b></p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

@endsection
