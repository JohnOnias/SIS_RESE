<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuário entrou com sucesso</h1>

    {{session('id_usuario')}}
    {{session('nome_usuario')}}

    <ul>
    @foreach($equipamentos as $equipamento)
        <li>{{$equipamento->nome_equipamento}}</li>
    @endforeach
    </ul>
    
    

</body>
</html>