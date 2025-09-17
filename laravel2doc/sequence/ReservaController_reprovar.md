sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant ReservaController as ReservaController
    participant Reserva as Reserva
    participant DB as Database
    
    C->>R: Request
    R->>+ReservaController: reprovar()
    Note over ReservaController: Process request
    alt Uses database
      ReservaController->>+Reserva: operation()
      Reserva->>+DB: Database query
      DB-->>-Reserva: Return data
      Reserva-->>-ReservaController: Return result
    else Direct response
      Note over ReservaController: Process without database
    end
    ReservaController-->>-R: Return response
    R-->>C: Response
    
    Note over ReservaController: Generic operation flow
  