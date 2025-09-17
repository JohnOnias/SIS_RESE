sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant AdmController as AdmController
    participant Model as Model
    participant DB as Database
    
    C->>R: Request
    R->>+AdmController: listarReservasDosUsuarios()
    Note over AdmController: Process request
    alt Uses database
      AdmController->>+Model: operation()
      Model->>+DB: Database query
      DB-->>-Model: Return data
      Model-->>-AdmController: Return result
    else Direct response
      Note over AdmController: Process without database
    end
    AdmController-->>-R: Return response
    R-->>C: Response
    
    Note over AdmController: Generic operation flow
  