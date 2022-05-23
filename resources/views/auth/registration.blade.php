@extends('layout')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header text-center text-light bg-success">Inscription</h3>
                    <div class="card-body">
                        <form action="{{ route('inscription') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="nom"
                                    required autofocus>
                                @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Abdoulaye" id="prenom" class="form-control" name="prenom"
                                    required autofocus>
                                @if ($errors->has('prenom'))
                                <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="77 78à 10 90" id="telephone" class="form-control" name="telephone"
                                    required autofocus>
                                @if ($errors->has('telephone'))
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Mermoz extension" id="name" class="form-control" name="adresse"
                                    required autofocus>
                                @if ($errors->has('adresse'))
                                <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn  btn-block btn-success">Inscription</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection