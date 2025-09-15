@extends('layouts.app')



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

   <!-- Auth Section -->
    @if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
    @else 
        redirect()->{{route('index')}}
    @endif

    @section('content')

    <section class="py-5">
        <div class="container">
            <div class="card shadow rounded-4 mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <!-- Login Form -->
                    <form id="login-form" method="POST">
                        @csrf
                        <h2 class="h5 mb-4 fw-bold text-center">Acesse sua conta</h2>

                        <div class="mb-3">
                            <label for="login-email" class="form-label">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="email" class="form-control" id="login-email" placeholder="e-mail" required name="email">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="login-password" class="form-label">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="login-password" placeholder="Sua senha" required name="senha">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">Lembrar-me</label>
                                </div>
                                <a href="#" class="small text-success">Esqueceu a senha?</a>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-sign-in-alt me-2"></i> Entrar
                        </button>

                        <p class="text-center mt-3">Não tem uma conta?
                            <a href="{{ route('telaCadastro') }}" id="switch-to-register" class="text-success fw-bold">Registre-se</a>

                        </p>
                    </form>
    
                </div>
            </div>
        </div>
    </section>

    @endsection