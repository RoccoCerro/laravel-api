@extends('layouts.app')

@section('content')
  <div class="container p-5">
    <div class="row justify-content-between">
      <div class="col-auto">
        <h1>Types</h1>
      </div>
      <div class="col-auto">
        <a class="btn btn-dark" href="{{ route('admin.types.create') }}">New type</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      @foreach ($types as $type)
        <div class="col-3 p-2">
          <div class="card">
            <div class="card-header">
              <p><a href="{{ route('admin.types.show', $type) }}">{{ $type->name }}</a></p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-auto"><a class="text-decoration-none btn btn-secondary" href="{{ route('admin.types.edit', $type) }}">Edit</a></div>
                <div class="col-auto">
                  <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                    
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