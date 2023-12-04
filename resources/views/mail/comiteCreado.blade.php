<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007BFF;
        }

        p {
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Has sido citado a un comité</h1>
        <p>¡Hola {{ $nombre }}!</p>
        <p>Has sido citado a un comité. Te recomendamos que asistas, aunque no es obligatorio.</p>
        <h2>Detalles del comité:</h2>
        <ul>
            <li><strong>Fecha y hora:</strong> {{ $comite->com_fecha }}</li>
            <li><strong>Lugar:</strong> {{ $comite->com_lugar }}</li>
            <li><strong>Instructor solicitante:</strong> {{ $comite->solicitud->aprendizs[0]->ficha->instructor->ins_nombres }} {{ $comite->solicitud->aprendizs[0]->ficha->instructor->ins_apellidos }}</li>
            <li><strong>Motivo:</strong> {{ $comite->solicitud->sol_motivo }}</li>
            <li><strong>Descripción del motivo:</strong> {{ $comite->solicitud->sol_descripcion }}</li>
        </ul>
    </div>
</body>

</html>
