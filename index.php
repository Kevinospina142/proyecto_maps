<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de localización</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-warning" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Sistema de localización</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./views/newUsuario.php">Agregar cliente</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <form action="./controller/ListClientesController.php" method="POST">

            <div class="alert alert-info">
                Para calcular la distancia de los clientes a un punto seleccionado, por favor selecciona el punto de referencia en el mapa de abajo y dale al botón "Localizar".
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

            <!-- Aquí va el contenedor del mapa -->
            <div id="mapa" style="height: 400px; width: 100%;"></div>

            <div class="text-center mt-4">
                <button class="btn btn-primary" type="submit">Localizar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- aqui se muestra el mapa y el boton de "Localizar"" -->
    <script>
        function iniciarMapa() {
            let latitud = 4.633105802898414;
            let longitud = -74.08060327642546;

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

    <!-- Asegúrate de incluir el script de Google Maps con tu API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9oqTGUUcfLcnevUhCcm9YTw03kqLbE7E&callback=iniciarMapa"></script>

</body>

</html>