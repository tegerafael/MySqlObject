<?php 

class Medico extends Crud{
    protected $tabela = 'Medico';
    private $idMed;
    private $nomeMed;
    private $crmMed;
    private $emailMed;
    private $celularMed;
    private $EspecialidadeMed;
    private $nomeEsp;

    public function inserir(){
        $nome = $this->getNomeMed();
        $crm = $this->getCrmMed();
        $email = $this->getEmailMed();
        $celular = $this->getCelularMed();
        $especialidade = $this->getEspecialidadeMed();

        $sqlInsert = "INSERT INTO $this->tabela (nomeMed, crmMed, emailMed, celularMed, EspecialidadeMed)
        VALUES ('$nome', '$crm', '$email', '$celular', '$especialidade')";
        
        if(Conexao::query($sqlInsert)){
            header('location: medicos.php');
        }
    }

    public function atualizar($campo, $id){
        $nome = $this->getNomeMed();
        $nome = $this->getNomeMed();
        $crm = $this->getCrmMed();
        $email = $this->getEmailMed();
        $celular = $this->getCelularMed();
        $especialidade = $this->getEspecialidadeMed();

		$sqlUpdate = "UPDATE $this->tabela SET 
        nomeMed = '$nome',
        crmMed = '$crm',
        emailMed = '$email',
        celularMed = '$celular',
        EspecialidadeMed = '$especialidade'

        WHERE $campo = {$id}";
		
        if(Conexao::query($sqlUpdate)){
            header('location: medicos.php');
        }
    }



	/**
	 * @return mixed
	 */
	public function getIdMed() {
		return $this->idMed;
	}
	
	/**
	 * @param mixed $idMed 
	 * @return self
	 */
	public function setIdMed($idMed): self {
		$this->idMed = $idMed;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNomeMed() {
		return $this->nomeMed;
	}
	
	/**
	 * @param mixed $nomeMed 
	 * @return self
	 */
	public function setNomeMed($nomeMed): self {
		$this->nomeMed = $nomeMed;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCrmMed() {
		return $this->crmMed;
	}
	
	/**
	 * @param mixed $crmMed 
	 * @return self
	 */
	public function setCrmMed($crmMed): self {
		$this->crmMed = $crmMed;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEmailMed() {
		return $this->emailMed;
	}
	
	/**
	 * @param mixed $emailMed 
	 * @return self
	 */
	public function setEmailMed($emailMed): self {
		$this->emailMed = $emailMed;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCelularMed() {
		return $this->celularMed;
	}
	
	/**
	 * @param mixed $celularMed 
	 * @return self
	 */
	public function setCelularMed($celularMed): self {
		$this->celularMed = $celularMed;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEspecialidadeMed() {
		return $this->EspecialidadeMed;
	}
	
	/**
	 * @param mixed $EspecialidadeMed 
	 * @return self
	 */
	public function setEspecialidadeMed($EspecialidadeMed): self {
		$this->EspecialidadeMed = $EspecialidadeMed;
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