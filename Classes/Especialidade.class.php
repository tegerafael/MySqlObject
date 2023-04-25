<?php 

class Especialidade extends Crud{
    protected $tabela = 'Especialidade';
    private $idEsp;
    private $nomeEsp;

    public function inserir(){
        $nome = $this->getNomeEsp();

        $sqlInsert = "INSERT INTO $this->tabela (nomeEsp)
        VALUES ('$nome')";
        
        if(Conexao::query($sqlInsert)){
            header('location: especialidadeGer.php');
        }
    }

    public function atualizar($campo, $id){
        $nome = $this->getNomeEsp();

		$sqlUpdate = "UPDATE $this->tabela SET 
        NomeEsp = '$nome'
        WHERE $campo = {$id}";
		
        if(Conexao::query($sqlUpdate)){
            header('location: especialidades.php');
        }
    }

	/**
	 * @return mixed
	 */
	public function getIdEsp() {
		return $this->idEsp;
	}
	
	/**
	 * @param mixed $idEsp 
	 * @return self
	 */
	public function setIdEsp($idEsp): self {
		$this->idEsp = $idEsp;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNomeEsp() {
		return $this->nomeEsp;
	}
	
	/**
	 * @param mixed $nomeEsp 
	 * @return self
	 */
	public function setNomeEsp($nomeEsp): self {
		$this->nomeEsp = $nomeEsp;
		return $this;
	}
}
?>