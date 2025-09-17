sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant UsuarioController as UsuarioController
    participant Reserva as Reserva
    participant DB as Database
    
    C->>R: Request
    R->>+UsuarioController: reservarEquipamento()
    Note over UsuarioController: Process request
    alt Uses database
      UsuarioController->>+Reserva: operation()
      Reserva->>+DB: Database query
      DB-->>-Reserva: Return data
      Reserva-->>-UsuarioController: Return result
    else Direct response
      Note over UsuarioController: Process without database
    end
    UsuarioController-->>-R: Return response
    R-->>C: Response
    
    Note over UsuarioController: Generic operation flow
  