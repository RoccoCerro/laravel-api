@extends('layouts.app')

@section('content')
<section class="create-projects p-5">
  <div class="container">
    <h2 class="fs-2">Edit Projects</h2>
  </div>
  <div class="container">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST">

      {{-- Cross Site Request Forgering --}}
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="insert title.." value="{{ old('title',$project->title) }}">
      </div>

      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug articolo" value="{{ old('slug',$project->slug) }}">
      </div>

      <div class="mb-3">
        <label for="type_id" class="form-label">Titolo</label>
        <select class="form-control" name="type_id" id="type_id">
          <option value="">-- Seleziona Categoria --</option>
          @foreach($types as $type)
          <option @selected( $type->id == old('type_id', $project->type_id ) ) value="{{ $type->id }}"> {{ $type->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group mb-3">
        <h2>Seleziona i tags</h2>

        <div class="d-flex gap-2">
          @foreach ($technologies as $technology)

          <div class="form-check">
            <input @checked( in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all() ))) name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="tag-{{$technology->id}}">
            <label class="form-check-label" for="tag-{{$technology->id}}">
              {{ $technology->name }}
            </label>
          </div>

          @endforeach
        </div>

      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <input type="text" name="content" class="form-control" id="content" placeholder="insert Content.." value="{{ old('content',$project->content) }}">
      </div>

      <button class="btn btn-primary">Add Projects</button>

    </form>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
      <ul>
        @foreach ($errors->all() as $error )
        <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

  </div>
</section>
@endsection