@extends('layouts.app')


@section('content')
  <div class="container p-5">
    <div class="row">
      <h1>Technology</h1>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Name</h4>
            <p>{{ $technology->name }}</p>
            <h5>Slug</h5>
            <p>{{ $technology->slug }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection