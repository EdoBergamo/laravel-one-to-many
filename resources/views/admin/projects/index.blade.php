@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="my-4">Elenco Progetti</h2>

  @if(count($projects) > 0)
  <div class="row">
    @foreach($projects as $project)
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <!-- <img src="{{ $project->owner_avatar_url }}" class="card-img-top rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;" alt=""> -->
            <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="img-fluid">
            <a href="https://github.com/EdoBergamo" class="text-black text-decoration-none" target="_blank">
              <h5 class="card-title" style="font-size: 16px;">EdoBergamo</h5>
            </a>
            <div class="d-flex ml-auto">
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning mx-2">Edit</a>
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questo progetto?')">Cancella</button>
            </form>
            </div>
          </div>
          <div class="card-body">
            <a href="{{ route('admin.projects.show', $project->id) }}" class="text-decoration-none">
              <h5 class="card-text">{{ $project->name }}</h5>
            </a>
            @if($project->description)
            <p>{{ $project->description }}</p>
            @endif

            <p>Updated {{ Carbon\Carbon::parse($project->updated_at)->diffForHumans()}}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <p class="alert alert-info">Nessun progetto disponibile.</p>
  @endif

  <div class="col-md-4 mb-4">
    <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Nuovo Progetto</a>
  </div>
</div>
@endsection