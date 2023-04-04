CREATE SCHEMA IF NOT EXISTS Clinica DEFAULT CHARACTER SET utf8mb3 ;
USE Clinica ;


-- -----------------------------------------------------
-- Table Especialidade
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Especialidade (
  idEsp INT NOT NULL AUTO_INCREMENT,
  NomeEsp VARCHAR(45) NOT NULL,
  PRIMARY KEY (idEsp));

-- -----------------------------------------------------
-- Table Medico
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Medico (
  idMed INT NOT NULL AUTO_INCREMENT,
  EspecialidadeMed INT NOT NULL,
  nomeMed VARCHAR(100) NULL DEFAULT NULL,
  crmMed VARCHAR(40) NULL DEFAULT NULL,
  emailMed VARCHAR(150) NOT NULL,
  celularMed VARCHAR(14) NOT NULL,
  PRIMARY KEY (idMed),
  INDEX fk_Medico_Especialidade_idx (EspecialidadeMed ASC) VISIBLE,
  CONSTRAINT fk_Medico_Especialidade
    FOREIGN KEY (EspecialidadeMed)
    REFERENCES Especialidade (idEsp));


-- -----------------------------------------------------
-- Table Paciente
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Paciente (
  idPac INT NOT NULL AUTO_INCREMENT,
  nomePac VARCHAR(100) NOT NULL,
  enderecoPac VARCHAR(100) NULL DEFAULT NULL,
  bairroPac VARCHAR(50) NULL DEFAULT NULL,
  cidadePac VARCHAR(50) NULL DEFAULT NULL,
  estadoPac VARCHAR(2) NULL DEFAULT NULL,
  cepPac VARCHAR(9) NULL DEFAULT NULL,
  nascimentoPac DATE NULL DEFAULT NULL,
  emailPac VARCHAR(150) NOT NULL,
  celularPac VARCHAR(14) NOT NULL,
  fotoPac VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (idPac));
  
-- -----------------------------------------------------
-- Table Consulta
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Consulta (
  idCon INT NOT NULL AUTO_INCREMENT,
  pacienteCon INT NOT NULL,
  medicoCon INT NOT NULL,
  dataCon DATE NOT NULL,
  horaCon TIME NOT NULL,
  PRIMARY KEY (idCon),
  INDEX fk_Consulta_Medico_idx (medicoCon ASC) VISIBLE,
  INDEX fk_Consulta_Paciente_idx (pacienteCon ASC) VISIBLE,
  CONSTRAINT fk_Consulta_Medico
    FOREIGN KEY (medicoCon)
    REFERENCES Medico (idMed),
  CONSTRAINT fk_Consulta_Paciente
    FOREIGN KEY (pacienteCon)
    REFERENCES Paciente (idPac));
    
    