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
  <div class="card-header bg-success">
    Modifier Etudiant
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul> 
      </div><br />
    @endif
      <form method="post" action="{{ route('students.update', $student->id) }}">
      @csrf {{ csrf_field() }} 
      {{ method_field('PUT') }}
      <div class="form-group">
             
              <label for="prenom">Prenom</label>
              <input type="text" class="form-control" name="prenom" value="{{ $student->prenom }}"/>
          </div>
          <div class="form-group">
              <label for="name">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{ $student->nom }}"/>
          </div>
          <div class="form-group">
            
              <label for="name">Telephone</label>
              <input type="number" class="form-control" name="telephone" value="{{ $student->telephone }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $student->email }}"/>
          </div>
          <div class="form-group">
              <label for="cours">Cours</label>
              <input type="text" class="form-control" name="cours" value="{{ $student->cours }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-success">Modifier</button>
      </form>
  </div>
</div>
@endsection
