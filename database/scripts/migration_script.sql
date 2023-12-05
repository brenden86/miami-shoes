-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: miami_shoes
-- Source Schemata: miami_shoes
-- Created: Mon Jul 24 15:51:34 2023
-- Workbench Version: 8.0.33
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema miami_shoes
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `miami_shoes` ;
CREATE SCHEMA IF NOT EXISTS `miami_shoes` ;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.inventory
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`inventory` (
  `sku` INT NOT NULL,
  `recv_date` DATE NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.order_items
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`order_items` (
  `order_id` VARCHAR(100) NULL DEFAULT NULL,
  `sku` INT NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.orders
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`orders` (
  `order_id` VARCHAR(100) NOT NULL,
  `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dlvr_date` DATETIME NOT NULL,
  `cust_email` VARCHAR(100) NOT NULL,
  `cust_phone` VARCHAR(10) NULL DEFAULT NULL,
  `cust_ext` TINYINT NULL DEFAULT NULL,
  `cust_first` VARCHAR(100) NOT NULL,
  `cust_last` VARCHAR(100) NOT NULL,
  `card_type` VARCHAR(100) NULL DEFAULT NULL,
  `card_last4` TINYINT NULL DEFAULT NULL,
  `bill_comp` VARCHAR(100) NULL DEFAULT NULL,
  `bill_street` VARCHAR(100) NULL DEFAULT NULL,
  `bill_street2` VARCHAR(100) NULL DEFAULT NULL,
  `bill_city` VARCHAR(100) NULL DEFAULT NULL,
  `bill_state` VARCHAR(100) NULL DEFAULT NULL,
  `bill_zip` VARCHAR(100) NULL DEFAULT NULL,
  `ship_comp` VARCHAR(100) NULL DEFAULT NULL,
  `ship_street` VARCHAR(100) NULL DEFAULT NULL,
  `ship_street2` VARCHAR(100) NULL DEFAULT NULL,
  `ship_city` VARCHAR(100) NULL DEFAULT NULL,
  `ship_state` VARCHAR(100) NULL DEFAULT NULL,
  `ship_zip` VARCHAR(100) NULL DEFAULT NULL,
  `ship_type` VARCHAR(100) NULL DEFAULT NULL,
  `dlvr_instr` VARCHAR(255) NULL DEFAULT NULL,
  `ordr_subtotal` DECIMAL(7,2) NOT NULL,
  `ship_cost` DECIMAL(7,2) NOT NULL,
  `ordr_taxes` DECIMAL(7,2) NOT NULL,
  PRIMARY KEY (`order_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.prod_colors
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`prod_colors` (
  `color_name` VARCHAR(100) NOT NULL,
  `color_hex` CHAR(6) NOT NULL,
  `filter_color` VARCHAR(100) NOT NULL,
  `filter_hex` CHAR(6) NULL DEFAULT NULL,
  PRIMARY KEY (`color_name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.prod_details
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`prod_details` (
  `prod_id` VARCHAR(255) NOT NULL,
  `prod_detail` VARCHAR(255) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.prod_images
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`prod_images` (
  `prod_id` INT NOT NULL,
  `img_path` VARCHAR(255) NOT NULL,
  UNIQUE INDEX `img_path` (`img_path` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.products
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`products` (
  `prod_id` INT NOT NULL AUTO_INCREMENT,
  `prod_name` VARCHAR(100) NOT NULL,
  `thumb_url` VARCHAR(255) NULL DEFAULT NULL,
  `brand` VARCHAR(100) NOT NULL,
  `gender` TINYINT NULL DEFAULT '0',
  `shoe_type` VARCHAR(100) NOT NULL,
  `price` DECIMAL(7,2) NOT NULL,
  `prim_color` VARCHAR(100) NOT NULL,
  `sec_color` VARCHAR(100) NOT NULL,
  `available` TINYINT(1) NULL DEFAULT '1',
  `avail_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`prod_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 225
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- ----------------------------------------------------------------------------
-- Table miami_shoes.stock
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `miami_shoes`.`stock` (
  `sku` INT NOT NULL AUTO_INCREMENT,
  `prod_id` INT NULL DEFAULT NULL,
  `size` DECIMAL(3,1) NULL DEFAULT NULL,
  PRIMARY KEY (`sku`))
ENGINE = InnoDB
AUTO_INCREMENT = 1351
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;
SET FOREIGN_KEY_CHECKS = 1;
