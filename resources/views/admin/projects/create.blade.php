@extends('layouts.app')

@section('content')
<section class="create-projects p-5">
  <div class="container">
    <h2 class="fs-2">Add new Projects</h2>
  </div>
  <div class="container">
    <form action="{{ route('admin.projects.store') }}" method="POST">

      {{-- Cross Site Request Forgering --}}
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="insert title..">
      </div>

      <div class="mb-3">
        <label for="img_url" class="form-label">img_url</label>
        <input type="text" name="img_url" class="form-control" id="img_url" placeholder="insert img_url..">
      </div>

      <div class="mb-3">
        <label for="type_id" class="form-label">Titolo</label>
        <select class="form-control" name="type_id" id="type_id">
          <option value="">-- Seleziona Categoria --</option>
          @foreach($types as $type)
          <option @selected( $type->id == old('type_id')) value="{{ $type->id }}"> {{ $type->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="d-flex gap-2">
        @foreach ($technologies as $technology)

        <div class="form-check">
          <input @checked( in_array($technology->id, old('technologies',[])) ) name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="tag-{{$technology->id}}">
          <label class="form-check-label" for="tag-{{$technology->id}}">
            {{ $technology->name }}
          </label>
        </div>

        @endforeach
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <input type="text" name="content" class="form-control" id="content" placeholder="insert Content..">
      </div>

      <button class="btn btn-dark">Add Projects</button>

    </form>

    @if ($errors->any())
    <p class="">
    <ul>
      @foreach ($errors->all() as $error )
      <li class="alert alert-danger">{{ $error }}</li>
      @endforeach
    </ul>
    </p>
    @endif

  </div>
</section>
@endsection