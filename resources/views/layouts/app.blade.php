<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<nav class="navbar navbar-dark bg-success shadow-sm mb-4">
  <div class="container d-flex align-items-center justify-content-center">
    <img src="https://ifce.edu.br/prpi/documentos-1/semic/2017/logo-ifce-horizontal.png" alt="IFCE Logo" style="height:60px;" class="me-3">
    <span class="fw-bold fs-4 text-white text-center">SISRESE IFCE</span>
  </div>
</nav>

<style>
  body {
    background: linear-gradient(180deg, #12c2527d 0%, #ffffffff 100%);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  .main-content {
    flex: 1;
  }
</style>

<!-- conteudo -->
<div class="container main-content">
  @yield('content')
</div>

<!-- Footer -->
<footer class="bg-light text-secondary py-3 border-top mt-auto">
  <div class="container">
    <div class="row">
      <div class="col-md-6 small">
        <strong>IFCE Campus Cedro</strong> &mdash; Sistema de Reservas Esportivas
        <br>
        <i class="fas fa-phone-alt me-1"></i> (85) 3455-3064
        <span class="mx-2">|</span>
        <i class="fas fa-envelope me-1"></i> reitoria@ifce.edu.br
      </div>
      <div class="col-md-6 text-md-end small">
        <a href="https://www.facebook.com/ifcecedro" target="_blank" class="text-secondary me-2"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/ifcecedrooficial/" target="_blank" class="text-secondary me-2"><i class="fab fa-instagram"></i></a>
        <a href="https://portal.ifce.edu.br/campus/cedro/" target="_blank" class="text-secondary"><i class="fa-solid fa-globe"></i></a>
        <br>
        <span class="d-block mt-2">&copy; 2025 IFCE Campus Cedro</span>
      </div>
    </div>
  </div>
</footer>