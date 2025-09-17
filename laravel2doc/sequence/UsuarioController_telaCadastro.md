sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant UsuarioController as UsuarioController
    participant Model as Model
    participant DB as Database
    
    C->>R: Request
    R->>+UsuarioController: telaCadastro()
    Note over UsuarioController: Process request
    alt Uses database
      UsuarioController->>+Model: operation()
      Model->>+DB: Database query
      DB-->>-Model: Return data
      Model-->>-UsuarioController: Return result
    else Direct response
      Note over UsuarioController: Process without database
    end
    UsuarioController-->>-R: Return response
    R-->>C: Response
    
    Note over UsuarioController: Generic operation flow
  