@extends('layouts.app')

@section('content')

@if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif
<div class="container my-4">
  <div class="row g-4">

    <main class="col-lg-9">
      <!-- <section id="dashboard" class="tab-content active card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="h4 mb-0">Visão Geral</h2>
          <select class="form-select form-select-sm w-auto">
            <option>Hoje</option>
            <option>Esta semana</option>
            <option selected>Este mês</option>
            <option>Este ano</option>
          </select>
        </div>

        <div class="row g-3 mb-4">
          <div class="col-md-4">
            <div class="card bg-primary bg-opacity-10 border-0 h-100">
              <div class="card-body d-flex justify-content-between align-items-start">
                <div>
                  <p class="text-primary fw-medium mb-1">Total Reservas</p>
                  <h3 class="fw-bold mb-1">84</h3>
                  <small class="text-primary"><i class="fas fa-arrow-up me-1"></i>12% em relação ao mês passado</small>
                </div>
                <div class="bg-primary bg-opacity-25 rounded-circle p-3">
                  <i class="fas fa-calendar text-primary fs-4"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-success bg-opacity-10 border-0 h-100">
              <div class="card-body d-flex justify-content-between align-items-start">
                <div>
                  <p class="text-success fw-medium mb-1">Reservas Concluídas</p>
                  <h3 class="fw-bold mb-1">72</h3>
                  <small class="text-success"><i class="fas fa-arrow-up me-1"></i>8% em relação ao mês passado</small>
                </div>
                <div class="bg-success bg-opacity-25 rounded-circle p-3">
                  <i class="fas fa-check-circle text-success fs-4"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-danger bg-opacity-10 border-0 h-100">
              <div class="card-body d-flex justify-content-between align-items-start">
                <div>
                  <p class="text-danger fw-medium mb-1">Cancelamentos</p>
                  <h3 class="fw-bold mb-1">5</h3>
                  <small class="text-danger"><i class="fas fa-arrow-down me-1"></i>2% em relação ao mês passado</small>
                </div>
                <div class="bg-danger bg-opacity-25 rounded-circle p-3">
                  <i class="fas fa-times-circle text-danger fs-4"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div>
          <h3 class="h5 mb-3">Atividade Recente</h3>
          <div class="bg-light rounded p-3">
            <div class="d-flex mb-3">
              <div class="bg-success bg-opacity-25 rounded-circle p-2 me-3">
                <i class="fas fa-calendar-plus text-success"></i>
              </div>
              <div>
                <p class="mb-1 fw-semibold">Nova reserva realizada</p>
                <small class="text-muted d-block">João Silva reservou a quadra de futsal para 15/07 às 14:00</small>
                <small class="text-muted">10 minutos atrás</small>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="bg-danger bg-opacity-25 rounded-circle p-2 me-3">
                <i class="fas fa-ban text-danger"></i>
              </div>
              <div>
                <p class="mb-1 fw-semibold">Penalidade aplicada</p>
                <small class="text-muted d-block">Maria Oliveira recebeu suspensão por 7 dias por não comparecimento</small>
                <small class="text-muted">1 hora atrás</small>
              </div>
            </div>
            <div class="d-flex">
              <div class="bg-primary bg-opacity-25 rounded-circle p-2 me-3">
                <i class="fas fa-user-shield text-primary"></i>
              </div>
              <div>
                <p class="mb-1 fw-semibold">Usuário bloqueado</p>
                <small class="text-muted d-block">Carlos Mendes foi bloqueado por violação repetida das regras</small>
                <small class="text-muted">3 horas atrás</small>
              </div>
            </div>
          </div>
        </div>
      </section> -->

      <section id="reservations" class="tab-content card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="h4 mb-0">Gerenciamento de Reservas</h2>

        </div>

        <!-- FORMULÁRIO DE RESERVA DE EQUIPAMENTO-->

        <form class="bg-light rounded p-3 mb-4 row g-3" method="post" >
        
          @csrf

          <!-- <div class="col-6 col-md-3">
            <label class="form-label small">Matricula</label>
            <input  type="text" class="form-select form-select-sm" name="matricula">
          </div> -->

          <div class="col-6 col-md-3">
            <label class="form-label small">Equipamento</label>

            <select class="form-select form-select-sm" name="equipamento_id">
            <!-- Usado para serva de equipamento -->
                <option value=""></option>
                @foreach($equipamentos as $equipamento)
                  <option value="{{$equipamento->id}}">{{$equipamento->nome_equipamento}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-6 col-md-3">
            <label class="form-label small">Horário Inicial</label>
            <input type="datetime-local" class="form-control form-control-sm" name="data_inicio" />
          </div>
          <div class="col-6 col-md-3">
            <label class="form-label small">Horário Final</label>
            <input type="datetime-local" class="form-control form-control-sm" name="data_fim" />
          </div>

          <button class="btn btn-success d-flex align-items-center">
              <i class="fas fa-plus me-2"></i> Reservar
          </button>
        </form>

        <div class="table-responsive">
          <table class="table table-striped align-middle mb-0">
            <thead class="table-light">
              <tr>
                
                <th>Esporte</th>
                <th>Entrada</th>
                <th>Devolução</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach($dados as $dado)
                <tr class="reservation-row">
                  <td>{{$dado->equipamento}}</td>
                  <td>{{date('d/m/Y H:i:s', strtotime($dado->data_inicio))}}</td>
                  <td>{{date('d/m/Y H:i:s', strtotime($dado->data_fim))}}</td>

                  @if($dado->status =='Aprovado')
                    <td><span class="badge bg-success text-dark">{{$dado->status}}</span></td>
                  @elseif($dado->status == 'Reprovado')
                    <td><span class="badge bg-danger text-dark">{{$dado->status}}</span></td>
                  @else
                    <td><span class="badge bg-warning text-dark">{{$dado->status}}</span></td>
                  @endif

                  @endforeach
                </tr>
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
          <small class="text-muted">Mostrando 1 a 4 de 12 reservas</small>
          <nav>
            <ul class="pagination pagination-sm mb-0">
              <li class="page-item"><button class="page-link">Anterior</button></li>
              <li class="page-item active"><button class="page-link">1</button></li>
              <li class="page-item"><button class="page-link">2</button></li>
              <li class="page-item"><button class="page-link">3</button></li>
              <li class="page-item"><button class="page-link">Próximo</button></li>
            </ul>
          </nav>
        </div>
      </section>

      <!-- Outras tabs podem ser convertidas de forma similar -->
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Script simples para troca de tabs
  document.querySelectorAll('button[data-tab]').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
      document.querySelectorAll('button[data-tab]').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById(btn.getAttribute('data-tab')).classList.add('active');
    });
  });
</script>

</body>
</html>


@endsection