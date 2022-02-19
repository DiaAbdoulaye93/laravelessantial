
@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <u><h3>Liste des Étudiants</h3></u>
  <table class="table">
    <thead>
        <tr class="table-warning">
  
          <td>Nom</td>
          <td>Prénom</td>
          <td>Email</td>
          <td>Téléphone</td>
          <td>Cours</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $students)
        <tr>
            <td>{{$students->nom}}</td>
            <td>{{$students->prenom}}</td>
            <td>{{$students->email}}</td>
               <td>{{$students->telephone}}</td>
               <td>{{$students->cours}}</td>
            <td class="text-center">
                <a href="{{ route('students.edit', $students->id)}}" class="btn btn-success btn-sm">modifier</a>
                <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">supprimer</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
