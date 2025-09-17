sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant UsuarioController as UsuarioController
    participant Usuario as Usuario
    participant DB as Database
    
    C->>R: Request
    R->>+UsuarioController: cadastrar()
    Note over UsuarioController: Process request
    alt Uses database
      UsuarioController->>+Usuario: operation()
      Usuario->>+DB: Database query
      DB-->>-Usuario: Return data
      Usuario-->>-UsuarioController: Return result
    else Direct response
      Note over UsuarioController: Process without database
    end
    UsuarioController-->>-R: Return response
    R-->>C: Response
    
    Note over UsuarioController: Generic operation flow
  