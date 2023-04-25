<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Especialidade</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="especialidades.php">Consultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cadastros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Atualizações</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
        <?php
            spl_autoload_register(function ($class) {
                require_once "./Classes/{$class}.class.php";
            });
            $cac = new Especialidade();
            if(filter_has_var(INPUT_GET, 'id')){
                $especialidade = new Especialidade();
                $id = filter_input(INPUT_GET, 'id');
                $espEdit = $especialidade->buscar('idEsp', $id);
            }
            if(filter_has_var(INPUT_GET, 'idDel')){
                $especialidade = new Especialidade();
                $id = filter_input(INPUT_GET, 'idDel');
                $especialidade->deletar('idEsp', $id);
                header('location: especialidades.php');
            }
            if (filter_has_var(INPUT_POST, 'btnGravar')){

            $especialidade = new Especialidade();
            $id = filter_input(INPUT_POST, 'txtId');
            $especialidade->setIdEsp($id);
            $especialidade->setNomeEsp(filter_input(INPUT_POST, 'txtNome'));

            if(empty($id)){
                $especialidade->inserir();
            } else {
                $especialidade->atualizar('idEsp', $id);
                }
            }
            ?>
            <form class="row g-3" action="<?php echo
                                            htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo isset($espEdit->idEsp)?$espEdit->idEsp:null; ?>">
                <div class="col-12">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..." name="txtNome" value="<?php echo isset($espEdit->NomeEsp)?$espEdit->NomeEsp:null;?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="btnGravar">Gravar</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>