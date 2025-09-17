classDiagram
  class Adm {
    <<Table: equipamentos>>
    +nome_equipamento
    +descricao_equipamento
    +quantidade_equipamento
    +quantidade_disponivel_equipamento
  }
  class Equipamento {
    +id
    +nome_equipamento
    +descricao_equipamento
    +quantidade_equipamento
    +quantidade_disponivel_equipamento
  }
  class Reserva {
    +usuario_id
    +equipamento_id
    +data_reserva
    +data_inicio
    +data_fim
    +status
  }
  class User {
    +name
    +email
    +password
  }
  class Usuario {
    <<Table: usuarios>>
    +id
    +nome_usuario
    +email_usuario
    +matricula_usuario
    +telefone_usuario
    +tipo_usuario
    +senha_usuario
  }
  class AdmController {
    <<Controller>>
    +telaAdm()
    +reservas_geral(Request $request)
    +dashBoard(Request $request)
    +inserirEquipamento(Request $request)
    +listarReservasDosUsuarios()
  }
  class Controller {
    <<Controller>>
  }
  class EquipamentoController {
    <<Controller>>
  }
  class HomeController {
    <<Controller>>
    +index(Request $request)
  }
  class ReservaController {
    <<Controller>>
    +fazerReserva(Request $request)
    +aprovar($id)
    +reprovar($id)
  }
  class UsuarioController {
    <<Controller>>
    +telaCadastro()
    +telaLogin()
    +home()
    +cadastrar(Request $request)
    +verificar(Request $request)
    +reservarEquipamento(Request $request)
    +listarEquipamentosReservados(Request $request)
  }
