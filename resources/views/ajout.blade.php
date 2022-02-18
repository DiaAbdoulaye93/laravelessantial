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
      Ajouter un utilisateur
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('students.store') }}">
      <div class="form-group">

        <label for="prenom">Prenom</label>
        <input type="text" class="form-control" name="prenom" />
      </div>
      <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="nom"  />
      </div>
      <div class="form-group">

        <label for="name">Telephone</label>
        <input type="text" class="form-control" name="telephone" />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email"/>
      </div>
      <div class="form-group">
        <label for="phone">Cours</label>
        <input type="tel" class="form-control" name="cours" />
      </div>
      <button type="submit" class="btn btn-block btn-danger">Ajouter</button>
    </form>
  </div>
</div>
@endsection