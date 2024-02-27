@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Nuovo Progetto</h2>

  <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="image">Immagine</label>
      <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="form-group">
      <label for="owner_avatar_url">URL Avatar Proprietario</label>
      <input type="text" name="owner_avatar_url" class="form-control">
    </div>

    <div class="form-group">
      <label for="html_url">URL HTML</label>
      <input type="text" name="html_url" class="form-control">
    </div>

    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salva Progetto</button>
  </form>
</div>
@endsection
