@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Modifica Progetto</h2>

  <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $project->name) }}" autocomplete="off" required>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $project->description) }}" autocomplete="off">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Salva</button>
    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-secondary mt-2">Annulla</a>
  </form>
</div>
@endsection