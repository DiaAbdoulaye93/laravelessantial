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
  <u>
    <h3>Liste des classes</h3>
  </u>
  <table class="table">
    <thead>
      <tr class="table-success">

        <td>Classe</td>
        <td>Effectif</td>
        <td>Année Scolaire</td>
        <td class="text-center">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach($classe as $classes)
      <tr>
        <td>{{$classes->libelle}}</td>
        <td>{{$classes->effectif}}</td>
        <td>{{$classes->anneescolaire}}</td>
        <td class="text-center">
          <a href="{{ route('classes.edit', $classes->id)}}" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
          <form action="{{ route('classes.destroy', $classes->id)}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    @endsection