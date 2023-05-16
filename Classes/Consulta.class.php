<?php 

class Consulta extends Crud{
    protected $tabela = 'Consulta';
    private $idCon;
    private $pacienteCon;
    private $medicoCon;
    private $dataCon;
    private $horaCon;

    public function inserir(){
        $paciente = $this->getPacienteCon();
        $medico = $this->getMedicoCon();
        $data = $this->getDataCon();
        $hora = $this->getHoraCon();

        $sqlInsert = "INSERT INTO $this->tabela (pacienteCon, medicoCon, dataCon, horaCon)
        VALUES ('$paciente', '$medico', '$data', '$hora')";
        
        if(Conexao::query($sqlInsert)){
            header('location: consultas.php');
        }
    }

    public function atualizar($campo, $id){
        $paciente = $this->getPacienteCon();
        $medico = $this->getMedicoCon();
        $data = $this->getDataCon();
        $hora = $this->getHoraCon();

		$sqlUpdate = "UPDATE $this->tabela SET 
        pacienteCon = '$paciente',
        medicoCon = '$medico',
        dataCon = '$data',
        horaCon = '$hora'

        WHERE $campo = {$id}";
		
        if(Conexao::query($sqlUpdate)){
            header('location: consultas.php');
        }
    }

	public function deletar($campo, $id){
		$sqlDelete = "DELETE FROM $this->tabela WHERE $campo = {$id}";

		if(Conexao::query($sqlDelete)){
			header('location: consultas.php');
		}
	}

	/**
	 * @return mixed
	 */
	public function getIdCon() {
		return $this->idCon;
	}
	
	/**
	 * @param mixed $idCon 
	 * @return self
	 */
	public function setIdCon($idCon): self {
		$this->idCon = $idCon;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getPacienteCon() {
		return $this->pacienteCon;
	}
	
	/**
	 * @param mixed $pacienteCon 
	 * @return self
	 */
	public function setPacienteCon($pacienteCon): self {
		$this->pacienteCon = $pacienteCon;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getMedicoCon() {
		return $this->medicoCon;
	}
	
	/**
	 * @param mixed $medicoCon 
	 * @return self
	 */
	public function setMedicoCon($medicoCon): self {
		$this->medicoCon = $medicoCon;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDataCon() {
		return $this->dataCon;
	}
	
	/**
	 * @param mixed $dataCon 
	 * @return self
	 */
	public function setDataCon($dataCon): self {
		$this->dataCon = $dataCon;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getHoraCon() {
		return $this->horaCon;
	}
	
	/**
	 * @param mixed $horaCon 
	 * @return self
	 */
	public function setHoraCon($horaCon): self {
		$this->horaCon = $horaCon;
		return $this;
	}
}
?>