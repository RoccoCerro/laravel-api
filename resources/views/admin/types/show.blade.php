@extends('layouts.app')


@section('content')
  <div class="container p-5">
    <div class="row">
      <h1>Tipo</h1>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Name</h4>
            <p>{{ $type->name }}</p>
            <h5>Slug</h5>
            <p>{{ $type->slug }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection