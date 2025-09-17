erDiagram
  adm {
    int id PK "Primary key"
    string nome_equipamento
    string descricao_equipamento
    string quantidade_equipamento
    string quantidade_disponivel_equipamento
    datetime created_at
    datetime updated_at
  }
  equipamento {
    int id PK "Primary key"
    string nome_equipamento
    string descricao_equipamento
    string quantidade_equipamento
    string quantidade_disponivel_equipamento
    datetime created_at
    datetime updated_at
  }
  reserva {
    int id PK "Primary key"
    int usuario_id FK "References usuario"
    int equipamento_id FK "References equipamento"
    string data_reserva
    string data_inicio
    string data_fim
    string status
    datetime created_at
    datetime updated_at
  }
  user {
    int id PK "Primary key"
    string name
    string email
    string password
    datetime created_at
    datetime updated_at
  }
  usuario {
    int id PK "Primary key"
    string nome_usuario
    string email_usuario
    string matricula_usuario
    string telefone_usuario
    string tipo_usuario
    string senha_usuario
    datetime created_at
    datetime updated_at
  }
