@extends('layouts.app')
    @section('content')
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .card-body {
            padding: 2rem;
        }
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
        .btn-success {
            background-color: #198754;
            border-color: #198754;
            padding: 0.75rem;
            font-weight: 600;
        }
        .btn-success:hover {
            background-color: #146c43;
            border-color: #146c43;
        }
        .input-group-text {
            background-color: #f8f9fa;
        }
        .alert {
            border-radius: 8px;
        }
        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .toggle-password {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>
<body>
    <section class="py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow rounded-4 mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <!-- Register Form -->
                    <form id="register-form"  method="POST" >
                        @csrf
                        <h2 class="h5 mb-4 fw-bold text-center">Crie sua conta</h2>

                        <div class="mb-3">
                            <label class="form-label">Nome Completo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Seu nome completo" required name="nome_usuario" value="{{ old('nome_usuario') }}">
                            </div>
                            @error('nome_usuario')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Matrícula IFCE</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control" placeholder="Sua matrícula" required name="matricula_usuario" value="{{ old('matricula_usuario') }}">
                            </div>
                            @error('matricula_usuario')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail Institucional</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="seu@email.ifce.edu.br" required name="email_usuario" value="{{ old('email_usuario') }}">
                            </div>
                            @error('email_usuario')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="(85) 9 9999-9999" name="telefone_usuario" value="{{ old('telefone_usuario') }}">
                            </div>
                            @error('telefone_usuario')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Crie uma senha" required name="senha_usuario" id="senha_usuario">
                                <button class="btn btn-outline-secondary toggle-password" type="button" aria-label="Mostrar ou ocultar senha">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength" id="password-strength"></div>
                            @error('senha_usuario')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar Senha</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="senha_usuario_confirmation" placeholder="Confirme a senha" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button" aria-label="Mostrar ou ocultar senha">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div id="password-match" class="mt-1"></div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="accept-terms" required>
                            <label for="accept-terms" class="form-check-label">
                                Eu concordo com os <a href="#" class="text-success">Termos de Serviço</a>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-user-plus me-2"></i> Registrar
                        </button>

                        <p class="text-center mt-3">Já tem uma conta?
                            <a href="{{ route('telaLogin') }}" id="switch-to-login" class="text-success fw-bold">Faça login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.toggle-password').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        });

        // Validação de força da senha
        const passwordInput = document.getElementById('senha_usuario');
        const strengthBar = document.getElementById('password-strength');
        const confirmPassword = document.querySelector('input[name="senha_usuario_confirmation"]');
        const matchText = document.getElementById('password-match');

        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 20;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[a-z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 20;
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;
            
            strengthBar.style.width = strength + '%';
            
            if (strength < 40) {
                strengthBar.style.backgroundColor = '#dc3545';
            } else if (strength < 80) {
                strengthBar.style.backgroundColor = '#ffc107';
            } else {
                strengthBar.style.backgroundColor = '#198754';
            }
        });

        // Verificar se as senhas coincidem
        confirmPassword.addEventListener('input', function() {
            if (confirmPassword.value !== passwordInput.value) {
                matchText.innerHTML = '<span class="text-danger">As senhas não coincidem</span>';
            } else {
                matchText.innerHTML = '<span class="text-success">As senhas coincidem</span>';
            }
        });

        // Validação do formulário antes de enviar
        document.getElementById('register-form').addEventListener('submit', function(e) {
            const password = passwordInput.value;
            const confirm = confirmPassword.value;
            
            if (password !== confirm) {
                e.preventDefault();
                matchText.innerHTML = '<span class="text-danger">As senhas não coincidem. Corrija antes de enviar.</span>';
                confirmPassword.focus();
            }
            
            if (password.length < 8) {
                e.preventDefault();
                alert('A senha deve ter pelo menos 8 caracteres');
                passwordInput.focus();
            }
        });
    </script>
</body>
</html>
    @endsection