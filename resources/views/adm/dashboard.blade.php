@extends('layouts.app')

@section('content')

<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Reservas Esportivas IFCE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .penalty-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .reservation-row:hover {
            background-color: #f0fdf4;
        }
        .status-pending {
            background-color: #fef08a;
            color: #854d0e;
        }
        .status-confirmed {
            background-color: #bbf7d0;
            color: #166534;
        }
        .status-cancelled {
            background-color: #fecaca;
            color: #991b1b;
        }
        .status-completed {
            background-color: #bfdbfe;
            color: #1e40af;
        }
        .penalty-active {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        .penalty-inactive {
            background-color: #dcfce7;
            color: #166534;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Header -->
    

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-green-600 text-white p-4">
                        <h2 class="text-xl font-semibold">Menu de Controle</h2>
                    </div>
                    <nav class="p-4">
                        <ul class="space-y-2">
                            <li>
                                <button data-tab="dashboard" class="tab-button w-full text-left px-4 py-3 rounded-lg font-medium flex items-center justify-between bg-green-100 text-green-800">
                                    <span><i class="fas fa-tachometer-alt mr-3"></i> Dashboard</span>
                                </button>
                            </li>
                            <li>
                                <button data-tab="reservations" class="tab-button w-full text-left px-4 py-3 rounded-lg font-medium flex items-center justify-between hover:bg-gray-100">
                                    <span><i class="fas fa-calendar-check mr-3"></i> Reservas</span>
                                </button>
                            </li>
                            <li>
                                <button data-tab="history" class="tab-button w-full text-left px-4 py-3 rounded-lg font-medium flex items-center justify-between hover:bg-gray-100">
                                    <span><i class="fas fa-history mr-3"></i> Histórico</span>
                                </button>
                            </li>
                            <li>
                                <button data-tab="penalties" class="tab-button w-full text-left px-4 py-3 rounded-lg font-medium flex items-center justify-between hover:bg-gray-100">
                                    <span><i class="fas fa-ban mr-3"></i> Penalidades</span>
                                </button>
                            </li>
                            <li>
                                <button data-tab="users" class="tab-button w-full text-left px-4 py-3 rounded-lg font-medium flex items-center justify-between hover:bg-gray-100">
                                    <span><i class="fas fa-users mr-3"></i> Usuários</span>
                                </button>
                            </li>
                            <li>
                                <button data-tab="settings" class="tab-button w-full text-left px-4 py-3 rounded-lg font-medium flex items-center justify-between hover:bg-gray-100">
                                    <span><i class="fas fa-cog mr-3"></i> Configurações</span>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Quick Stats -->
                <div class="mt-6 bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold mb-4">Estatísticas Rápidas</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-gray-500 text-sm">Reservas essa Semana</p>

                            <p class="text-2xl font-bold">{{$qtd_reservas}}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Penalidades Ativas</p>
                            <p class="text-2xl font-bold">{{$qtd_penalidades_ativas}}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Usuários Bloqueados</p>
                            <p class="text-2xl font-bold">{{$qtd_tipo_penalidade}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Panel -->
            <div class="lg:w-3/4">
                <!-- Dashboard Tab -->
                <div id="dashboard" class="tab-content active">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Visão Geral</h2>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-500">Período:</span>
                                <select class="border border-gray-300 rounded px-3 py-1 text-sm">
                                    <option>Hoje</option>
                                    <option>Esta semana</option>
                                    <option selected>Este mês</option>
                                    <option>Este ano</option>
                                </select>
                            </div>
                        </div>

                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-blue-50 rounded-lg p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-blue-600 font-medium">Total Reservas</p>
                                        <p class="text-3xl font-bold mt-2">84</p>
                                        <p class="text-sm text-blue-600 mt-1"><i class="fas fa-arrow-up mr-1"></i> 12% em relação ao mês passado</p>
                                    </div>
                                    <div class="bg-blue-100 p-3 rounded-full">
                                        <i class="fas fa-calendar text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-green-600 font-medium">Reservas Concluídas</p>
                                        <p class="text-3xl font-bold mt-2">72</p>
                                        <p class="text-sm text-green-600 mt-1"><i class="fas fa-arrow-up mr-1"></i> 8% em relação ao mês passado</p>
                                    </div>
                                    <div class="bg-green-100 p-3 rounded-full">
                                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-red-50 rounded-lg p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-red-600 font-medium">Cancelamentos</p>
                                        <p class="text-3xl font-bold mt-2">5</p>
                                        <p class="text-sm text-red-600 mt-1"><i class="fas fa-arrow-down mr-1"></i> 2% em relação ao mês passado</p>
                                    </div>
                                    <div class="bg-red-100 p-3 rounded-full">
                                        <i class="fas fa-times-circle text-red-600 text-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Atividade Recente</h3>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <div class="bg-green-100 p-2 rounded-full mr-3">
                                            <i class="fas fa-calendar-plus text-green-600"></i>
                                        </div>
                                        <div>
                                            @if($ultima_reserva)
                                            <p class="font-medium">Nova reserva realizada</p>
                                            <p class="text-sm text-gray-500">{{$ultima_reserva->nome_usuario}} reservou {{$ultima_reserva->nome_equipamento}} para {{$ultima_reserva->data_reserva}}</p>
                                            <!-- <p class="text-xs text-gray-400">10 minutos atrás</p> -->
                                             @else
                                             <p class="font-medium">Sem reserva recente</p>
                                            <p class="text-sm text-gray-500"> sem reserva recente</p>
                                             <p class="text-xs text-gray-400">-- -- --</p>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="bg-red-100 p-2 rounded-full mr-3">
                                            <i class="fas fa-ban text-red-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Penalidade aplicada</p>
                                            <p class="text-sm text-gray-500">Maria Oliveira recebeu suspensão por 7 dias por não comparecimento</p>
                                            <p class="text-xs text-gray-400">1 hora atrás</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                                            <i class="fas fa-user-shield text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Usuário bloqueado</p>
                                            <p class="text-sm text-gray-500">Carlos Mendes foi bloqueado por violação repetida das regras</p>
                                            <p class="text-xs text-gray-400">3 horas atrás</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reservations Tab -->
                <div id="reservations" class="tab-content">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Gerenciamento de Reservas</h2>
                            <div class="flex space-x-3">
                                <div class="relative">
                                    <input type="text" placeholder="Buscar reservas..." class="border border-gray-300 rounded px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Nova Reserva
                                </button>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                        <option>Todos</option>
                                        <option>Confirmadas</option>
                                        <option>Pendentes</option>
                                        <option>Canceladas</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Esporte</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                        <option>Todos</option>
                                        <option>Futsal</option>
                                        <option>Ping Pong</option>
                                        <option>Vôlei</option>
                                        <option>Basquete</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Data Inicial</label>
                                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Data Final</label>
                                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Reservations Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Esporte</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data/Horário</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="reservation-row">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">João Silva</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Futsal</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/07/2023 14:00-15:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full status-confirmed">Confirmada</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-green-600 hover:text-green-900 mr-3"><i class="fas fa-eye"></i></button>
                                            <button class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr class="reservation-row">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-002</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Maria Oliveira</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ping Pong</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">16/07/2023 10:00-11:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full status-pending">Pendente</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-green-600 hover:text-green-900 mr-3"><i class="fas fa-eye"></i></button>
                                            <button class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr class="reservation-row">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-003</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Carlos Mendes</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Vôlei</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14/07/2023 16:00-17:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full status-cancelled">Cancelada</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-green-600 hover:text-green-900 mr-3"><i class="fas fa-eye"></i></button>
                                            <button class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr class="reservation-row">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-004</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ana Souza</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Basquete</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13/07/2023 18:00-19:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full status-completed">Concluída</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-green-600 hover:text-green-900 mr-3"><i class="fas fa-eye"></i></button>
                                            <button class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="flex items-center justify-between mt-6">
                            <div class="text-sm text-gray-500">
                                Mostrando 1 a 4 de 12 reservas
                            </div>
                            <div class="flex space-x-1">
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm hover:bg-gray-100">Anterior</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm bg-green-600 text-white">1</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm hover:bg-gray-100">2</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm hover:bg-gray-100">3</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm hover:bg-gray-100">Próximo</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- History Tab -->
                <div id="history" class="tab-content">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Histórico de Reservas</h2>
                            <div class="flex space-x-3">
                                <div class="relative">
                                    <input type="text" placeholder="Buscar histórico..." class="border border-gray-300 rounded px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
                                    <i class="fas fa-download mr-2"></i> Exportar
                                </button>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipo</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                        <option>Todos</option>
                                        <option>Reservas</option>
                                        <option>Cancelamentos</option>
                                        <option>Penalidades</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Usuário</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                        <option>Todos</option>
                                        <option>João Silva</option>
                                        <option>Maria Oliveira</option>
                                        <option>Carlos Mendes</option>
                                        <option>Ana Souza</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Data Inicial</label>
                                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Data Final</label>
                                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                </div>
                            </div>
                        </div>

                        <!-- History Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                  
</body>
</html>
@endsection