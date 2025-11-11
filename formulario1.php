<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
  
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .contenedor {
            background-color: #ffffff;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, textarea, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <h2>Registrate:</h2>
    <form action="#" method="post">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" required placeholder="Escribe tu nombre">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required minlength="6" placeholder="Mínimo 6 caracteres">

        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="">Seleccione una opción</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
        </select>

        <!--label for="comentarios">Comentarios:</label>
        <textarea id="comentarios" name="comentarios" rows="4" placeholder="Escribe un comentario..."></textarea>

        <label>
            <input type="checkbox" name="terminos" required> Acepto los términos y condiciones
        </label-->

        <button type="submit">Enviar</button>
        <button type="submit">Borrar</button>
    </form>
</div>

</body>
</html>

