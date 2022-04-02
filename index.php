<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD php - API fetch</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
</head>

<body>

    <div>
        <div>
            <h3>Registro de contratistas</h3>
        </div>
        <div>
            <form action="" method="post" id="frm">
                <div>
                    <label for="">Codigo</label>
                    <input type="hidden" name="idp" id="idp" value="">
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo">
                </div>
                <div class="form-group">
                    <label for="">Producto</label>
                    <input type="text" name="producto" id="producto" placeholder="Descripción">
                </div>
                <div class="form-group">precio
                    <label for="">Precio</label>
                    <input type="text" name="precio" id="precio" placeholder="Precio">
                </div>
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="text" name="cantidad" id="cantidad" placeholder="cantidad">
                </div>
                <div class="form-group">
                    <input type="button" value="Registrar" id="registrar">
                </div>
            </form>
        </div>
        
        <div>
            <div>
                <form action="" method="post">
                    <div>
                        <label for="buscar">Buscar:</label>
                        <input type="text" name="buscar" id="buscar" placeholder="Buscar...">
                    </div>
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Empresa</th>
                        <th>Seccion</th>
                        <th>Patente</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody id="resultado">
                </tbody>
            </table>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>