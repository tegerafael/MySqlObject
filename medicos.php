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
    <title>Médicos</title>
</head>

<body>
    <header>
        <nav class="nav">
            <ul class="nav nav-tabs">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Médicos</a>
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
            <div class="d-flex flex-row-reverse">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post" class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="txtPesquisar" placeholder="Pesquisar"
                                name="txtPesquisar">
                            <label for="pesquisar">Pesquisar</label>
                        </div>
                        <button class="btn btn-outline-secondary" type="submit" id="btnPesquisar" name="btnPesquisar">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CRM</th>
                        <th>Celular</th>
                        <th>Especialidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    spl_autoload_register(function ($class) {
                        require_once "./Classes/{$class}.class.php";
                    });
                    $medico = new Medico();
                    if (filter_has_var(INPUT_POST, 'txtPesquisar')) {
                        $parametro = filter_input(INPUT_POST, 'txtPesquisar');
                        $where = "where (nomeMed like '%$parametro%') or (emailMed like '%$parametro%')";
                        $dadosBanco = $medico->listar($where);
                    } else {
                        $dadosBanco = $medico->listar();
                    }

                    while ($row = $dadosBanco->fetch_object()) {

                        ?>
                        <tr>
                            <td>
                                <?php echo $row->nomeMed; ?>
                            </td>
                            <td>
                                <?php echo $row->emailMed; ?>
                            </td>
                            <td>
                                <?php echo $row->crmMed; ?>
                            </td>
                            <td>
                                <?php echo $row->celularMed; ?>
                            </td>
                            <td>
                                <?php echo $row->EspecialidadeMed; ?>
                            </td>
                            <td><a href="medicoGer.php?id=<?php echo $row->idMed ?>" class="btn btn-primary">
                                    <span class="material-symbols-outlined">
                                        edit_square
                                    </span>
                                </a>
                                <a href="medicoGer.php?idDel=<?php echo $row->idMed ?>" class="btn btn-danger">
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
                <a href="medicoGer.php" class="btn btn-success">
                    <span class="material-symbols-outlined">note_add</span></a>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>