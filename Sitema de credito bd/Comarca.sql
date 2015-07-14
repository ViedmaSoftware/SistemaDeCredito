-- MySQL Script generated by MySQL Workbench
-- 05/04/15 09:33:07
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema lacomarca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lacomarca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lacomarca` DEFAULT CHARACTER SET utf8 ;
USE `lacomarca` ;

-- -----------------------------------------------------
-- Table `lacomarca`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`departamentos` (
  `id` INT(3) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL,
  `id_provincias` INT(2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lacomarca`.`vinculaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`vinculaciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(45) NULL,
  `detalle` VARCHAR(45) NULL,
  `id_laborales` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`detalle_prestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`detalle_prestamo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nro_cuota` VARCHAR(45) NULL,
  `mes` VARCHAR(45) NULL,
  `vencimiento` VARCHAR(45) NULL,
  `capital` VARCHAR(45) NULL,
  `interes` VARCHAR(45) NULL,
  `iva` VARCHAR(45) NULL,
  `tipo_cuenta` VARCHAR(45) NULL,
  `id_prestamos` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`Tarjeta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`Tarjeta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(16) NULL,
  `fecha_otorgamiento` DATE NULL,
  `cuentas_id_cuenta` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`movimientos_tarjeta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`movimientos_tarjeta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `monto` DECIMAL NULL,
  `cuotas` INT NULL,
  `interes` DECIMAL NULL,
  `Tarjeta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_movimientos_tarjeta_Tarjeta1_idx` (`Tarjeta_id` ASC),
  CONSTRAINT `fk_movimientos_tarjeta_Tarjeta1`
    FOREIGN KEY (`Tarjeta_id`)
    REFERENCES `lacomarca`.`Tarjeta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`detalle_tarjeta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`detalle_tarjeta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero_cuota` INT NULL,
  `monto_cuota` DECIMAL NULL,
  `vencimiento_uno_cuota` DATE NULL,
  `vencimento_dos_cuota` DATE NULL,
  `interes_cuota` DECIMAL NULL,
  `descuento_cuota` DECIMAL NULL,
  `cancelado_cuotas` TINYINT(1) NULL,
  `movimientos_tarjeta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_detalle_tarjeta_movimientos_tarjeta1_idx` (`movimientos_tarjeta_id` ASC),
  CONSTRAINT `fk_detalle_tarjeta_movimientos_tarjeta1`
    FOREIGN KEY (`movimientos_tarjeta_id`)
    REFERENCES `lacomarca`.`movimientos_tarjeta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`tipo_documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`tipo_documento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(5) NULL DEFAULT NULL,
  `detalle` VARCHAR(35) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`estado_civil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`estado_civil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`persona` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nro_documento` VARCHAR(15) NULL DEFAULT NULL,
  `apellido` VARCHAR(35) NULL DEFAULT NULL,
  `nombre` VARCHAR(35) NULL DEFAULT NULL,
  `nacimiento` VARCHAR(45) NULL DEFAULT NULL,
  `sexo` VARCHAR(15) NULL DEFAULT NULL,
  `id_tipo_documento` INT NOT NULL,
  `id_estado_civil` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_tipodocumento1_idx` (`id_tipo_documento` ASC),
  INDEX `fk_persona_estadocivil1_idx` (`id_estado_civil` ASC),
  CONSTRAINT `fk_persona_tipodocumento1`
    FOREIGN KEY (`id_tipo_documento`)
    REFERENCES `lacomarca`.`tipo_documento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_estadocivil1`
    FOREIGN KEY (`id_estado_civil`)
    REFERENCES `lacomarca`.`estado_civil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`tipo_direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`tipo_direccion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `codigo_telefono` VARCHAR(10) NULL DEFAULT NULL,
  `codigo_postal` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`provincia` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `id_pais` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_provincia_pais1_idx` (`id_pais` ASC),
  CONSTRAINT `fk_provincia_pais1`
    FOREIGN KEY (`id_pais`)
    REFERENCES `lacomarca`.`pais` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lacomarca`.`localidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`localidad` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `codigo_postal` VARCHAR(10) NULL DEFAULT NULL,
  `codigo_telefono` VARCHAR(10) NULL DEFAULT NULL,
  `id_departamento` INT(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lacomarca`.`direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`direccion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(35) NULL DEFAULT NULL,
  `nrocalle` VARCHAR(5) NULL DEFAULT NULL,
  `escalera` VARCHAR(5) NULL DEFAULT NULL,
  `piso` VARCHAR(5) NULL DEFAULT NULL,
  `departamento` VARCHAR(5) NULL DEFAULT NULL,
  `id_tipo_direccion` INT NOT NULL,
  `id_localidad` INT(4) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_direccion_tipodireccion1_idx` (`id_tipo_direccion` ASC),
  INDEX `fk_direccion_localidad1_idx` (`id_localidad` ASC),
  CONSTRAINT `fk_direccion_tipodireccion1`
    FOREIGN KEY (`id_tipo_direccion`)
    REFERENCES `lacomarca`.`tipo_direccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_localidad1`
    FOREIGN KEY (`id_localidad`)
    REFERENCES `lacomarca`.`localidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`tipodocumento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`tipodocumento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(6) NULL DEFAULT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nrotarjeta` VARCHAR(45) NULL DEFAULT NULL,
  `ingreso` DATE NULL DEFAULT NULL,
  `id_persona` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cliente_persona1_idx` (`id_persona` ASC),
  CONSTRAINT `fk_cliente_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`contacto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `telefono_fijo` VARCHAR(20) NULL DEFAULT NULL,
  `telefono_movil` VARCHAR(20) NULL DEFAULT NULL,
  `telefono_laboral` VARCHAR(20) NULL DEFAULT NULL,
  `correo_electronico` VARCHAR(100) NULL DEFAULT NULL,
  `pagina_web` VARCHAR(100) NULL DEFAULT NULL,
  `id_persona` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contacto_persona1_idx` (`id_persona` ASC),
  CONSTRAINT `fk_contacto_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`laboral`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`laboral` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ocupacion` VARCHAR(45) NULL DEFAULT NULL,
  `actividad` VARCHAR(45) NULL DEFAULT NULL,
  `sueldo` DECIMAL NULL DEFAULT NULL,
  `ingreso` DATE NULL DEFAULT NULL,
  `nombre_institucion` VARCHAR(50) NOT NULL,
  `cuil_institucion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`vinculacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`vinculacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(45) NULL DEFAULT NULL,
  `detalle` VARCHAR(45) NULL DEFAULT NULL,
  `id_laboral` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vinculacion_laboral1_idx` (`id_laboral` ASC),
  CONSTRAINT `fk_vinculacion_laboral1`
    FOREIGN KEY (`id_laboral`)
    REFERENCES `lacomarca`.`laboral` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`persona_laboral`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`persona_laboral` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NOT NULL,
  `id_laboral` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_has_laboral_laboral1_idx` (`id_laboral` ASC),
  INDEX `fk_persona_has_laboral_persona1_idx` (`id_persona` ASC),
  CONSTRAINT `fk_persona_has_laboral_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_persona_has_laboral_laboral1`
    FOREIGN KEY (`id_laboral`)
    REFERENCES `lacomarca`.`laboral` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`persona_direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`persona_direccion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NOT NULL,
  `id_direccion` INT NOT NULL,
  INDEX `fk_persona_has_direccion_direccion1_idx` (`id_direccion` ASC),
  INDEX `fk_persona_has_direccion_persona1_idx` (`id_persona` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_persona_has_direccion_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_persona_has_direccion_direccion1`
    FOREIGN KEY (`id_direccion`)
    REFERENCES `lacomarca`.`direccion` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`tipo_familia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`tipo_familia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`persona_persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`persona_persona` (
  `id_persona` INT NOT NULL,
  `id_familiar` INT NOT NULL,
  `id_tipofamilia` INT NOT NULL,
  PRIMARY KEY (`id_persona`, `id_familiar`),
  INDEX `fk_persona_has_persona_persona2_idx` (`id_familiar` ASC),
  INDEX `fk_persona_has_persona_persona1_idx` (`id_persona` ASC),
  INDEX `fk_persona_has_persona_tipofamilia1_idx` (`id_tipofamilia` ASC),
  CONSTRAINT `fk_persona_has_persona_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_persona_has_persona_persona2`
    FOREIGN KEY (`id_familiar`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_persona_has_persona_tipofamilia1`
    FOREIGN KEY (`id_tipofamilia`)
    REFERENCES `lacomarca`.`tipo_familia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`plan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`plan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `valor` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`interes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`interes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `valor` DECIMAL NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`punitorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`punitorio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `valor` DECIMAL NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`cuenta` (
  `id_cuenta` INT NOT NULL AUTO_INCREMENT,
  `numcuenta` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  PRIMARY KEY (`id_cuenta`),
  INDEX `fk_cuenta_cliente1_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_cuenta_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `lacomarca`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`prestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`prestamo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `otorgado` DATE NULL DEFAULT NULL,
  `monto` DECIMAL NULL DEFAULT NULL,
  `plan_id` INT NOT NULL,
  `interes_id` INT NOT NULL,
  `punitorio_id` INT NOT NULL,
  `cuenta_id_cuenta` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_prestamo_plan1_idx` (`plan_id` ASC),
  INDEX `fk_prestamo_interes1_idx` (`interes_id` ASC),
  INDEX `fk_prestamo_punitorio1_idx` (`punitorio_id` ASC),
  INDEX `fk_prestamo_cuenta1_idx` (`cuenta_id_cuenta` ASC),
  CONSTRAINT `fk_prestamo_plan1`
    FOREIGN KEY (`plan_id`)
    REFERENCES `lacomarca`.`plan` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_interes1`
    FOREIGN KEY (`interes_id`)
    REFERENCES `lacomarca`.`interes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_punitorio1`
    FOREIGN KEY (`punitorio_id`)
    REFERENCES `lacomarca`.`punitorio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_cuenta1`
    FOREIGN KEY (`cuenta_id_cuenta`)
    REFERENCES `lacomarca`.`cuenta` (`id_cuenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`garante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`garante` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(45) NULL DEFAULT NULL,
  `id_persona` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_garante_persona1_idx` (`id_persona` ASC),
  CONSTRAINT `fk_garante_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`garante_prestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`garante_prestamo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_garante` INT NOT NULL,
  `id_prestamo` INT NOT NULL,
  INDEX `fk_garante_has_prestamo_prestamo1_idx` (`id_prestamo` ASC),
  INDEX `fk_garante_has_prestamo_garante1_idx` (`id_garante` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_garante_has_prestamo_garante1`
    FOREIGN KEY (`id_garante`)
    REFERENCES `lacomarca`.`garante` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_garante_has_prestamo_prestamo1`
    FOREIGN KEY (`id_prestamo`)
    REFERENCES `lacomarca`.`prestamo` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(35) NULL DEFAULT NULL,
  `contrasenia` VARCHAR(35) NULL DEFAULT NULL,
  `tipo` VARCHAR(35) NULL DEFAULT NULL,
  `id_persona` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_persona1_idx` (`id_persona` ASC),
  CONSTRAINT `fk_usuario_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `lacomarca`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`rol` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(35) NULL DEFAULT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rol_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_rol_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `lacomarca`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `razon_social` VARCHAR(45) NULL DEFAULT NULL,
  `cuit` VARCHAR(45) NULL DEFAULT NULL,
  `calle` VARCHAR(45) NULL DEFAULT NULL,
  `nro_calle` VARCHAR(45) NULL DEFAULT NULL,
  `escalera` VARCHAR(45) NULL DEFAULT NULL,
  `piso` VARCHAR(45) NULL DEFAULT NULL,
  `departamento` VARCHAR(45) NULL DEFAULT NULL,
  `telefono_fijo` VARCHAR(45) NULL DEFAULT NULL,
  `telefono_celular` VARCHAR(45) NULL DEFAULT NULL,
  `correo_electronico` VARCHAR(45) NULL DEFAULT NULL,
  `pagina_web` VARCHAR(45) NULL DEFAULT NULL,
  `incio_actividad` DATE NULL DEFAULT NULL,
  `detalles` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacomarca`.`laboral_direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacomarca`.`laboral_direccion` (
  `id` INT NOT NULL,
  `id_direccion` INT NOT NULL,
  `id_laboral` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_direccion_idx` (`id_direccion` ASC),
  INDEX `fk_laboral_idx` (`id_laboral` ASC),
  CONSTRAINT `fk_direccion`
    FOREIGN KEY (`id_direccion`)
    REFERENCES `lacomarca`.`direccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboral`
    FOREIGN KEY (`id_laboral`)
    REFERENCES `lacomarca`.`laboral` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
