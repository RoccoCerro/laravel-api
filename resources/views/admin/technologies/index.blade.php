@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row justify-content-between">
      <div class="col-auto">
        <h1>Technology</h1>
      </div>
      <div class="col-auto">
        <a class="btn btn-dark" href="{{ route('admin.technologies.create') }}">New Technology</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      @foreach ($technologies as $technology)
        <div class="col-3 p-2">
          <div class="card">
            <div class="card-header">
              <p><a href="{{ route('admin.technologies.show', $technology) }}">{{ $technology->name }}</a></p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-auto"><a class="text-decoration-none btn btn-secondary" href="{{ route('admin.technologies.edit', $technology) }}">Edit</a></div>
                <div class="col-auto">
                  <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                    
                    @csrf
                    @method('DELETE')
          
                    <button class="btn btn-danger link-danger text-white">Delete</button>
                  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection