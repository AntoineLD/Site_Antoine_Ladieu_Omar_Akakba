-- Migration SQL pour créer la base et la table users
-- Exécuter depuis MySQL/MariaDB (ex: via phpMyAdmin ou terminal)
CREATE DATABASE IF NOT EXISTS `freshveg` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `freshveg`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `email` VARCHAR(191) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exemple d'utilisateur (mot de passe: password123)

-- Table des produits
CREATE TABLE IF NOT EXISTS `products` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sku` VARCHAR(50) NOT NULL UNIQUE,
  `name` VARCHAR(191) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `price` DECIMAL(8,2) NOT NULL DEFAULT 0.00,
  `image` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des commandes (logs)
CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` VARCHAR(100) NOT NULL UNIQUE,
  `user_id` INT UNSIGNED DEFAULT NULL,
  `total` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` INT UNSIGNED NOT NULL,
  `product_id` INT UNSIGNED NOT NULL,
  `sku` VARCHAR(50) DEFAULT NULL,
  `product_name` VARCHAR(191) DEFAULT NULL,
  `unit_price` DECIMAL(8,2) NOT NULL DEFAULT 0.00,
  `quantity` INT UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY (`order_id`),
  KEY (`product_id`),
  CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_order_items_product` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insérer quelques produits exemples (les images doivent exister dans assets/img)
INSERT INTO `products` (sku, name, description, price, image) VALUES
('tomate01','Tomates Cœur de Bœuf Bio','Tomates juteuses et savoureuses',4.50,'assets/img/tomates.png'),
('carotte01','Carottes des Sables','Carottes croquantes et sucrées',2.80,'assets/img/carottes.png'),
('courgette01','Courgettes Vertes Bio','Courgettes locales',3.20,'assets/img/courgette.png'),
('haricot_vert01','Haricots verts Bio','Haricots verts frais',2.50,'assets/img/haricots_verts.png'),
('haricot_blanc01','Haricots Blancs','Haricots blancs secs ou frais',2.00,'assets/img/haricots_blancs.png'),
('celeri01','Branche de céleri Bio','Céleri croquant',1.00,'assets/img/céleri.png'),
('patate01','Pommes de Terre Agata Bio','Pommes de terre farineuses',1.90,'assets/img/agata.jpg'),
('poivron01','Poivrons Rouges Bio','Poivrons sucrés',4.90,'assets/img/poivron.jpg'),
('aubergine01','Aubergines Violettes Bio','Aubergines charnues',3.50,'assets/img/aubergine.png'),
('radis01','Botte de Radis Bio','Radis croquants',1.50,'assets/img/radis_roses.jpg'),
('brocoli01','Brocoli Vert Bio','Brocoli frais',2.20,'assets/img/broco.png'),
('poireau01','Poireaux d\'Hiver Bio','Poireaux doux et longs',2.90,'assets/img/poireaux.jpg');

