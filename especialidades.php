<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/layout.css">
    <title>Especialidades</title>
</head>

<body>
    <header>
        <nav class="nav">
            <ul class="nav nav-tabs">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Pacientes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pacientes.php">Listar</a></li>
                        <li><a class="dropdown-item" href="pacienteGer.php">Cadastrar</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>
                    <ul class="nav nav-tabs">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Especialidades</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="especialidades.php">Listar</a></li>
                                <li><a class="dropdown-item" href="especialidadeGer.php">Cadastrar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                    <ul class="nav nav-tabs">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Medicos</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="medicos.php">Listar</a></li>
                                <li><a class="dropdown-item" href="medicoGer.php">Cadastrar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
        </nav>

    </header>
    <main class="mt-3">
        <div class="container">
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>Especialidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    spl_autoload_register(function ($class) {
                        require_once "./Classes/{$class}.class.php";
                    });
                    $especialidade = new Especialidade();
                    $dadosBanco = $especialidade->listar();
                    while ($row = $dadosBanco->fetch_object()) {

                        ?>
                        <tr>
                            <td>
                                <?php echo $row->NomeEsp; ?>
                            </td>
                            <td><a href="especialidadeGer.php?id=<?php echo $row->idEsp ?>" class="btn btn-primary">
                                    <span class="material-symbols-outlined">
                                        edit_square
                                    </span>
                                </a>
                                <a href="especialidadeGer.php?idDel=<?php echo $row->idEsp ?>" class="btn btn-danger">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="col-12">
                <a href="especialidadeGer.php" class="btn btn-success">
                    <span class="material-symbols-outlined">note_add</span></a>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>