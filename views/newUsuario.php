<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Formulario de Registro</h3>
                <form method="POST" action="../controller/InsertClienteController.php">
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Número de Documento</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese su número de documento" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="latitud" class="form-label">Latitud</label>
                            <input type="text" class="form-control" id="latitud" name="lat" placeholder="Latitud" required>
                        </div>
                        <div class="col">
                            <label for="longitud" class="form-label">Longitud</label>
                            <input type="text" class="form-control" id="longitud" name="lng" placeholder="Longitud" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button type="submit" class="btn btn-primary w-100">Guardar Usuario</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6" id="mapa" style="width: 50%; height: 500px;">
                <!-- ubicacion mapa -->
            </div>
        </div>
    </div>

    <script>
        function iniciarMapa() {
            let latitud = 4.632394666289011;
            let longitud = -74.08085808628189;

            coordenadas = {
                lng: longitud,
                lat: latitud
            }

            generarMapa(coordenadas);
        }

        function generarMapa(coordenadas) {
            let mapa = new google.maps.Map(document.getElementById("mapa"), {
                zoom: 12,
                center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
            });

            marcador = new google.maps.Marker({
                map: mapa,
                draggable: true,
                position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
            });

            marcador.addListener('dragend', function(event) {
                document.getElementById("latitud").value = this.getPosition().lat();
                document.getElementById("longitud").value = this.getPosition().lng();
            });
        }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9oqTGUUcfLcnevUhCcm9YTw03kqLbE7E&callback=iniciarMapa"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>