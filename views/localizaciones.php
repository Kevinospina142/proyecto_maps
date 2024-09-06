<?php
session_start();

// Verifica si hay resultados en la sesión
if (isset($_SESSION['resultados'])) {
    $clientes = $_SESSION['resultados'];
    unset($_SESSION['resultados']); // Limpiar la sesión después de usarla
} else {
    $clientes = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de localizacion</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg  bg-warning " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Sistema de localizacion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../views/newUsuario.php">Agregar cliente</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (!empty($clientes)): ?>
        <div class="container">
            <div>
                <h1 class="align-center">Listado de clientes</h1>
                <p class="align-justify">
                    Los clientes estan ordenados desde el cliente mas cercano al punto seleccionado al cliente mas alejado.
                </p>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Distancia (metros)</th>
                    </tr>
                </thead>
                <?php foreach ($clientes as $cliente): ?>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($cliente['cedula']) ?></td>
                            <td><?= htmlspecialchars($cliente['nombres']) ?></td>
                            <td><?= htmlspecialchars($cliente['apellidos']) ?></td>
                            <td><?= htmlspecialchars($cliente['direccion']) ?></td>
                            <td><?= htmlspecialchars($cliente['Distancia']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">No se encontraron clientes en la base de datos, registra usuarios aqui. <a class="" aria-current="page" href="../views/newUsuario.php">Agregar cliente</a></div>
        <?php endif; ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>