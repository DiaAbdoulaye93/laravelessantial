@extends('layout')
@section('content')
<style>
  .container {
    max-width: 450px;
  }

  .push-top {
    margin-top: 50px;
  }
</style>
<div class="card push-top">
  <div class="card-header">
    Ajouter un étudiant
  </div>
  <div class="card-body">

    <form method="post" action="{{ route('students.store') }}">
      @csrf {{ csrf_field() }}
      <div class="form-group">

        <label for="prenom">Prenom</label>
        <input type="text" class="form-control" name="prenom"  value="{{ old('prenom') }}"/>
        @error('prenom')
        <div class="alert alert-danger">Le prenom est un champ obligatoire</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" />
        @error('nom')
        <div class="alert alert-danger">Le nom est un champ obligatoire</div>
        @enderror
      </div>
      <div class="form-group">

        <label for="name">Telephone</label>
        <input type="number" class="form-control" name="telephone" value="{{ old('telephone') }}" />
        @error('telephone')
        <div class="alert alert-danger">Le telephone est un champ obligatoire</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
        @error('email')
        <div class="alert alert-danger">Le mail est un champ obligatoire</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="phone">Cours</label>
        <input type="tel" class="form-control" name="cours" value="{{ old('cours') }}" />
        @error('cours')
        <div class="alert alert-danger">Le cours est un champ obligatoire</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-block btn-success">Ajouter</button>
    </form>
  </div>
</div>
@endsection