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
                    <input type="hidden" name="idp" id="idp" value="">
                </div>
                <div>
                    <label for="">Autorizado</label>
                    <input type="text" name="autorizado" id="autorizado" placeholder="Autorizado">
                </div>
                <div>
                    <label for="">Rut</label>
                    <input type="text" name="rut" id="rut" placeholder="Rut">
                </div>
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                </div>
                <div>
                    <label for="">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                </div>
                <div>
                    <label for="">Empresa</label>
                    <input type="text" name="empresa" id="empresa" placeholder="Empresa">
                </div>
                <div>
                    <label for="">Seccion</label>
                    <input type="text" name="seccion" id="seccion" placeholder="Seccion">
                </div>
                <div>
                    <label for="">Patente</label>
                    <input type="text" name="patente" id="patente" placeholder="Patente">
                </div>
                <div>
                    <label for="">Observaciones</label>
                    <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones">
                </div>
                <div>
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
                        <th>Autorizado</th>
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