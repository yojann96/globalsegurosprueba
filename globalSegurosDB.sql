


-- -----------------------------------------------------
-- Table `globalsegurosbd`.`tbl_Cargo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `globalsegurosbd`.`tbl_Cargo` ;

CREATE TABLE IF NOT EXISTS `globalsegurosbd`.`tbl_Cargo` (
  `id_Cargo` INT NOT NULL AUTO_INCREMENT,
  `descripcionCargo` VARCHAR(255) NULL,
  `sueldoCargo` INT NULL,
  PRIMARY KEY (`id_Cargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `globalsegurosbd`.`tbl_Colaborador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `globalsegurosbd`.`tbl_Colaborador` ;

CREATE TABLE IF NOT EXISTS `globalsegurosbd`.`tbl_Colaborador` (
  `id_Colaborador` INT NOT NULL AUTO_INCREMENT,
  `tipoDocColaborador` VARCHAR(45) NULL,
  `numeroDocColaborador` VARCHAR(45) NULL,
  `apellidosColaborador` VARCHAR(80) NULL,
  `nombreColaborador` VARCHAR(80) NULL,
  `fechaNacimiento` DATE NULL,
  `genero` VARCHAR(45) NULL,
  `idFkCargo` INT NULL,
  PRIMARY KEY (`id_Colaborador`),
  INDEX `IdFkCargo_idx` (`idFkCargo` ASC),
  CONSTRAINT `IdFkCargo`
    FOREIGN KEY (`idFkCargo`)
    REFERENCES `globalsegurosbd`.`tbl_Cargo` (`id_Cargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `globalsegurosbd`.`tbl_Tienda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `globalsegurosbd`.`tbl_Tienda` ;

CREATE TABLE IF NOT EXISTS `globalsegurosbd`.`tbl_Tienda` (
  `id_Tienda` INT NOT NULL AUTO_INCREMENT,
  `nombreTienda` VARCHAR(150) NULL,
  `direccionTienda` VARCHAR(80) NULL,
  `telefonoTienda` INT NULL,
  PRIMARY KEY (`id_Tienda`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `globalsegurosbd`.`tbl_RegistroTrabajo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `globalsegurosbd`.`tbl_RegistroTrabajo` ;

CREATE TABLE IF NOT EXISTS `globalsegurosbd`.`tbl_RegistroTrabajo` (
  `id_RegistroTrabajo` INT NOT NULL AUTO_INCREMENT,
  `fechaRegistroTrabajo` DATE NULL,
  `IdFkColaborador` INT NULL,
  `idFkTienda` INT NULL,
  PRIMARY KEY (`id_RegistroTrabajo`),
  INDEX `idFkColaborador_idx` (`IdFkColaborador` ASC),
  INDEX `idFkTienda_idx` (`idFkTienda` ASC),
  CONSTRAINT `idFkColaborador`
    FOREIGN KEY (`IdFkColaborador`)
    REFERENCES `globalsegurosbd`.`tbl_Colaborador` (`id_Colaborador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idFkTienda`
    FOREIGN KEY (`idFkTienda`)
    REFERENCES `globalsegurosbd`.`tbl_Tienda` (`id_Tienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
