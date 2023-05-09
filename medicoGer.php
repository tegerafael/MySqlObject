<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
    <main>
        <div class="container">
            <?php
            spl_autoload_register(function ($class) {
                require_once "./Classes/{$class}.class.php";
            });
            $cac = new Medico();
            if (filter_has_var(INPUT_GET, 'id')) {
                $medico = new Medico();
                $id = filter_input(INPUT_GET, 'id');
                $medEdit = $medico->buscar('idMed', $id);
            }
            if (filter_has_var(INPUT_GET, 'idDel')) {
                $medico = new Medico();
                $id = filter_input(INPUT_GET, 'idDel');
                $medico->deletar('idMed', $id);
                header('location: medicos.php');
            }
            if (filter_has_var(INPUT_POST, 'btnGravar')) {

                $medico = new Medico();
                $id = filter_input(INPUT_POST, 'txtId');
                $medico->setIdMed($id);
                $medico->setNomeMed(filter_input(INPUT_POST, 'txtNome'));
                $medico->setEmailMed(filter_input(INPUT_POST, 'txtEmail'));
                $medico->setCelularMed(filter_input(INPUT_POST, 'txtCelular'));
                $medico->setCrmMed(filter_input(INPUT_POST, 'txtCrm'));
                $medico->setEspecialidadeMed(filter_input(INPUT_POST, 'txtEspecialidade'));

            if (empty($id)) {
                $medico->inserir();
            } else {
                $medico->atualizar('idMed', $id);
            }
            }
        
            ?>
            <form class="row g-3" action="<?php echo
                htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo isset($medEdit->idMed) ? $medEdit->idMed : null; ?>">
                <div class="col-12">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..." name="txtNome"
                        value="<?php echo isset($medEdit->nomeMed) ? $medEdit->nomeMed : null; ?>">
                </div>
                <div class="col-12">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="txtEmail" placeholder="Digite seu email..." name="txtEmail"
                        value="<?php echo isset($medEdit->emailMed) ? $medEdit->emailMed : null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCelular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="txtCelular" name="txtCelular"
                        value="<?php echo isset($medEdit->celularMed) ? $medEdit->celularMed : null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCrm" class="form-label">CRM</label>
                    <input type="text" class="form-control" id="txtCrm" name="txtCrm"
                        value="<?php echo isset($medEdit->crmMed) ? $medEdit->crmMed : null; ?>">
                </div>
                <div class="col-12">
                    <label for="txtEspecialidade" class="form-label">Especialidade</label>
                    <input type="text" class="form-control" id="txtEspecialidade" placeholder="" name="txtEspecialidade"
                        value="<?php echo isset($medEdit->EspecialidadeMed) ? $medEdit->EspecialidadeMed : null; ?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="btnGravar">Gravar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>