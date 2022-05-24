@extends('layout')
@section('content')
<main class="login-form">
    <div class="cotainer mt-5">
        <div class="row  mt-5">
            <div class="col-md-6">
                <img src="assets/images/Build your home-pana.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 mt-5">

                <h3 class="card-header text-center bg-success text-light">Authentification</h3>
                <div class="card-body shadow-lg">
                    <form method="POST" action="{{ route('connection') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Se rappeler de Moi
                                </label>
                            </div>
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-success btn-block">Connexion</button>
                        </div>
                    </form>
                    <div class="text-center">

                        <span>Pas encor de compte ?

                            <a href="{{ url('inscriptionForm')}}" class="text-success">S'inscrire</a>
                        </span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</main>
@endsection