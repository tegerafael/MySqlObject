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
    <main>
        <div class="container">
            <?php
            spl_autoload_register(function ($class) {
                require_once "./Classes/{$class}.class.php";
            });
            $cac = new Consulta();
            if (filter_has_var(INPUT_GET, 'id')) {
                $consulta = new Consulta();
                $id = filter_input(INPUT_GET, 'id');
                $conEdit = $consulta->buscar('idCon', $id);
            }
            if (filter_has_var(INPUT_GET, 'idDel')) {
                $consulta = new Consulta();
                $id = filter_input(INPUT_GET, 'idDel');
                $consulta->deletar('idCon', $id);
                header('location: consultas.php');
            }
            if (filter_has_var(INPUT_POST, 'btnGravar')) {

                $consulta = new Consulta();
                $id = filter_input(INPUT_POST, 'txtId');
                $consulta->setIdCon($id);
                $consulta->setPacienteCon(filter_input(INPUT_POST, 'sltPaciente'));
                $consulta->setMedicoCon(filter_input(INPUT_POST, 'sltMedico'));
                $consulta->setDataCon(filter_input(INPUT_POST, 'txtData'));
                $consulta->setHoraCon(filter_input(INPUT_POST, 'txtHora'));

                if (empty($id)) {
                    $consulta->inserir();
                } else {
                    $consulta->atualizar('idCon', $id);
                }
            }

            ?>
            <form class="row g-3" action="<?php echo
                htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="txtId"
                    value="<?php echo isset($conEdit->idCon) ? $conEdit->idCon : null; ?>">
                <div class="col-12">
                    <label for="sltPaciente" class="form-label">Paciente</label>
                    <select id="sltPaciente" class="form-select" name="sltPaciente">
                        <?php $pacSel = isset($conEdit->pacienteCon) ?
                            $medEdit->pacienteCon : null ?>
                        <option value="" selected hidden>Escolha...</option>
                        <?php
                        $paciente = new Paciente();
                        $dadosBanco = $paciente->listar();
                        while ($row = $dadosBanco->fetch_object()) {
                            ?>
                            <option value="<?php echo $row->idPac ?>" <?php
                               if ($pacSel === $row->idPac) {
                                   echo 'select';
                               }
                               ?>>
                                <?php
                                echo $row->nomePac
                                    ?>
                            </option>
                        <?php } ?>
                    </select>

                </div>
                <div class="col-12">
                    <label for="sltMedico" class="form-label">Médico</label>
                    <select id="sltMedico" class="form-select" name="sltMedico">
                        <?php $medSel = isset($conEdit->medicoCon) ?
                            $pacEdit->medicoCon : null ?>
                        <option value="" selected hidden>Escolha...</option>
                        <?php
                        $medico = new Medico();
                        $dadosBanco = $medico->listar();
                        while ($row = $dadosBanco->fetch_object()) {
                            ?>
                            <option value="<?php echo $row->idMed ?>" <?php
                               if ($medSel === $row->idMed) {
                                   echo 'select';
                               }
                               ?>>
                                <?php
                                echo $row->nomeMed
                                    ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="txtData" class="form-label">Data da Consulta:</label>
                    <input type="date" class="form-control" id="txtData" name="txtData"
                        value="<?php echo isset($conEdit->dataCon) ? $conEdit->dataCon : null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtHora" class="form-label">Hora da Consulta:</label>
                    <input type="time" class="form-control" id="txtHora" name="txtHora"
                        value="<?php echo isset($conEdit->horaCon) ? $conEdit->horaCon : null; ?>">
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