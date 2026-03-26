<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    ```
    <title>Sistema de Seguimiento</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    ```

</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="text-center bg-white p-10 rounded-lg shadow-lg">

    ```
    <h1 class="text-4xl font-bold text-green-600 mb-4">
        Sistema de Seguimiento de Aprendices
    </h1>

    <p class="text-gray-600 mb-6">
        Plataforma para la gestión de aprendices, instructores y programas de formación.
    </p>

    @auth

        <div class="mt-4 text-gray-700 mb-6">
            <p><strong>Usuario:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Rol:</strong> {{ Auth::user()->rol->Descripcion }}</p>
        </div>

    @endauth

    <div class="flex justify-center gap-4">

        <a href="/redirect">IR AL SISTEMA</a>


    </div>
    ```

</div>

</body>
</html>
