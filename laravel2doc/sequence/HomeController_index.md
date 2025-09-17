sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant HomeController as HomeController
    participant Equipamento as Equipamento
    participant DB as Database
    
    C->>R: GET /resource
    R->>+HomeController: index()
    HomeController->>+Equipamento: all() / get() / paginate()
    Equipamento->>+DB: SELECT * FROM table
    DB-->>-Equipamento: Return records
    Equipamento-->>-HomeController: Collection of models
    HomeController-->>-R: Return JSON response
    R-->>C: 200 OK with data
    
    Note over HomeController,Equipamento: This sequence retrieves a list of resources
  