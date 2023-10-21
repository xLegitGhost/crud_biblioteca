<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar registros</title>
    <style>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php
    
    include ("../PHP/db_conn.php");

    session_start();

    ?>

    <nav class="nav navbar bg-dark">
        <div class="container">
        <a href="home.html"><button class="btn btn-info">Regresar</button></a>
        </div>
    </nav>

    <div class="container">
        <br>

        <?php
            if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php session_unset(); } ?>



                <h1>Libros disponibles</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Editorial</th>
                            <th>ISBN</th>
                            <th>N. Pags</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM libros";
                            $resultado = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($resultado)){ ?>
                                <tr>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['titulo']; ?></td>
                                    <td><?php echo $row['editorial']; ?></td>
                                    <td><?php echo $row['ISBN']; ?></td>
                                    <td><?php echo $row['num_pags']; ?></td>
                                    <td>
                                        <a href="../login/index.php?codigo=<?php echo $row['codigo']; ?>">
                                        <button class="btn btn-primary">Solicitar</button>
                                        </a>
                                        <a href="editLibro.php?codigo=<?php echo $row['codigo']; ?>">
                                        <button class="btn btn-warning">Editar</button>
                                        </a>
                                        <a href="../controllers/deleteLibro.php?codigo=<?php echo $row['codigo']; ?>">
                                        <button class="btn btn-danger">Eliminar</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                    </tbody>
                </table>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>