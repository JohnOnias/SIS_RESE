# API Documentation

## Project: laravel/laravel

Laravel Version: v12.28.1

Generated: 17/09/2025, 15:40:28

## Table of Contents

- [web](#web)

## web

| Method | Endpoint | Handler | Description |
|--------|----------|---------|-------------|
| GET | / | function(){
    return redirect()->route("telaLogin");
});


// rotas get
Route::get("user/login", [UsuarioController::class, 'telaLogin' | List resource |
| GET | user/cadastro | UsuarioController::class, 'telaCadastro' | List cadastro |
| GET | user/home | UsuarioController::class, 'home' | List home |
| GET | user/home | HomeController::class, 'index' | List home |
| GET | user/home | UsuarioController::class, 'listarEquipamentosReservados' | List home |
| GET | adm/insert | AdmController::class, 'telaAdm' | List insert |
| GET | adm/dashboard | AdmController::class, 'dashboard' | List dashboard |
| GET | /adm/dashboard/reservas_geral | AdmController::class, 'listarReservasDosUsuarios' | List reservas_geral |
| POST | /adm/inserir | AdmController::class, 'inserirEquipamento' | Create a new inserir |
| POST | user/cadastro | UsuarioController::class, 'cadastrar' | Create a new cadastro |
| POST | user/login | UsuarioController::class, 'verificar' | Create a new login |
| POST | user/home | UsuarioController::class, 'reservarEquipamento' | Create a new home |
| POST | /reservar | ReservaController::class, 'fazerReserva' | Create a new reservar |
| PUT | /reservas/{id}/aprovar | ReservaController::class, 'aprovar' | Update a specific aprovar |
| PUT | /reservas/{id}/reprovar | ReservaController::class, 'reprovar' | Update a specific reprovar |

### GET /

**Handler:** function(){
    return redirect()->route("telaLogin");
});


// rotas get
Route::get("user/login", [UsuarioController::class, 'telaLogin'

**Description:** List resource

---

### GET user/cadastro

**Handler:** UsuarioController::class, 'telaCadastro'

**Description:** List cadastro

---

### GET user/home

**Handler:** UsuarioController::class, 'home'

**Description:** List home

---

### GET user/home

**Handler:** HomeController::class, 'index'

**Description:** List home

---

### GET user/home

**Handler:** UsuarioController::class, 'listarEquipamentosReservados'

**Description:** List home

---

### GET adm/insert

**Handler:** AdmController::class, 'telaAdm'

**Description:** List insert

---

### GET adm/dashboard

**Handler:** AdmController::class, 'dashboard'

**Description:** List dashboard

---

### GET /adm/dashboard/reservas_geral

**Handler:** AdmController::class, 'listarReservasDosUsuarios'

**Description:** List reservas_geral

---

### POST /adm/inserir

**Handler:** AdmController::class, 'inserirEquipamento'

**Description:** Create a new inserir

---

### POST user/cadastro

**Handler:** UsuarioController::class, 'cadastrar'

**Description:** Create a new cadastro

---

### POST user/login

**Handler:** UsuarioController::class, 'verificar'

**Description:** Create a new login

---

### POST user/home

**Handler:** UsuarioController::class, 'reservarEquipamento'

**Description:** Create a new home

---

### POST /reservar

**Handler:** ReservaController::class, 'fazerReserva'

**Description:** Create a new reservar

---

### PUT /reservas/{id}/aprovar

**Handler:** ReservaController::class, 'aprovar'

**Description:** Update a specific aprovar

---

### PUT /reservas/{id}/reprovar

**Handler:** ReservaController::class, 'reprovar'

**Description:** Update a specific reprovar

---

