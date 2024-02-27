@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card my-4">
    <div class="card-header">
      <a href="{{ $project->html_url }}" target="_blank" class="text-decoration-none">
        <h2 class="mb-0">{{ $project->name }}</h2>
      </a>
    </div>
    
    @if ($project->description)
    <div class="card-body">
      <p class="lead">{{ $project->description }}</p>
    </div>
    @endif

    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <strong>Data di Creazione:</strong> {{ $project->created_at->format('d M Y H:i:s') }}
      </li>
      <li class="list-group-item">
        <strong>Ultimo aggiornamento:</strong> {{ Carbon\Carbon::parse($project->updated_at)->diffForHumans() }}
      </li>
    </ul>

    <div class="card-footer">
      <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
      <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Cancella</button>
      </form>

      <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Progetti</a>
    </div>
  </div>
</div>
@endsection