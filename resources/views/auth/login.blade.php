@extends('layout')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-3">
                    <h3 class="card-header text-center bg-success text-light">Authentification</h3>
                    <div class="card-body">
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
                                <button type="submit" class="btn btn-success btn-block">Signin</button>
                            </div>
                        </form>
                    </div>
                    <span>Pas encor de compte ?

                        <a class="nav-link" href="{{ url('inscriptionForm')}}">Inscription</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection