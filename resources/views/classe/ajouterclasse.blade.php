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
        Ajouter une classe
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('classes.store') }}">
            @csrf {{ csrf_field() }}
            <div class="form-group">

                <label for="prenom">Libelle</label>
                <input type="text" class="form-control" name="libelle" />
            </div>
            <div class="form-group">
                <label for="name">Effectif</label>
                <input type="text" class="form-control" name="effectif" />
            </div>
            <div class="form-group">

                <label for="name">Année Scolaire</label>
                <input type="date" class="form-control" name="anneescolaire" />
            </div>
            <button type="submit" class="btn btn-block btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection