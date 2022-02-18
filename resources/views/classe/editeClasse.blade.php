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
        <form method="post" action="{{ route('classes.update', $classe->id) }}">
            @csrf {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">

                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" name="libelle" value="{{ $classe->libelle }}" />
            </div>
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="effectif" value="{{ $classe->effectif }}" />
            </div>
            <div class="form-group">

                <label for="name">Année Scolaire</label>
                <input type="date" class="form-control" name="anneescolaire" value="{{ $classe->anneescolaire }}" />
            </div>
            <button type="submit" class="btn btn-block btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection