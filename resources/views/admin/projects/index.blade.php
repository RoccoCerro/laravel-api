@extends('layouts.app')

@section('hero')

@include('partials.hero')

@endsection

@section('content')

<div class="page-content-index">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-auto p-5">
        <a class="btn btn-dark" href="{{ route('admin.projects.create')}}">New Project</a>
      </div>
    </div>
  
    <div class="row">
      @foreach ($projects as $project)
      <div class="col-3 p-2">
        <div class="card h-100 my-card">
          <img src="{{ $project->img_url }}" class="card-img-top w-100 my-img-card" alt="...">
          <div class="card-body">
            <div class="row flex-column justify-content-between h-100 gap-2">
              <div class="col-auto">
                <h5 class="card-title"><a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></h5>
              </div>
              <div class="col-auto">
                <p class="card-text">{{ $project->content !== null ? substr($project->content, 0, 50).'...' : '' }}</p>
              </div>
              <div class="col-auto">
                <div class="my-card-btn row justify-content-center">
                  <div class="col-auto">
                    <a class="btn btn-text-decoration-none text-white btn-secondary" href="{{ route('admin.projects.edit', $project) }}">modifica</a>
                  </div>
                  <div class="col-auto">
                    <form class="project-destroy-form" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
          
                      @csrf
                      @method('DELETE')
          
                      <button class="btn btn-danger link-danger text-white">Elimina</button>
                      
                      <div class="d-none modal-delete" >
                        <h5>Sei sicuro di voler eliminare?</h5>
                        <button class="btn-yes">si</button>
                        <button class="btn-no">no</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>


  <!-- <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>Content</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
      <tr>
        <td>
          <a class="text-white text-decoration-none" href="{{ route('admin.projects.show', $project) }}">
            {{ $project->title }}
          </a>
        </td>
        <td>{{$project->slug}}</td>
        <td>{{$project->content}}</td>
        <td><a class="btn btn-text-decoration-none text-white btn-secondary" href="{{ route('admin.projects.edit', $project) }}">modifica</a></td>
        <td>
          <form action="{{ route('admin.projects.destroy',$project) }}" method="POST">

            @csrf
            @method('DELETE')

            <button class="btn btn-danger link-danger text-white">Elimina</button>

          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> -->

@endsection