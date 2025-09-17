sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant AdmController as AdmController
    participant Adm as Adm
    participant DB as Database
    
    C->>R: Request
    R->>+AdmController: inserirEquipamento()
    Note over AdmController: Process request
    alt Uses database
      AdmController->>+Adm: operation()
      Adm->>+DB: Database query
      DB-->>-Adm: Return data
      Adm-->>-AdmController: Return result
    else Direct response
      Note over AdmController: Process without database
    end
    AdmController-->>-R: Return response
    R-->>C: Response
    
    Note over AdmController: Generic operation flow
  