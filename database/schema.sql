CREATE DATABASE IF NOT EXISTS `servis_mobilov_web`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `servis_mobilov_web`;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  meno VARCHAR(120) NOT NULL,
  telefon VARCHAR(60) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS page_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  page VARCHAR(80) NOT NULL,
  column_class VARCHAR(80) NOT NULL,
  css_class VARCHAR(120) NOT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  detail1_label VARCHAR(120) NOT NULL,
  detail1_value VARCHAR(255) NOT NULL,
  detail2_label VARCHAR(120) NOT NULL,
  detail2_value VARCHAR(255) NOT NULL,
  detail3_label VARCHAR(120) NOT NULL,
  detail3_value VARCHAR(255) NOT NULL,
  button_text VARCHAR(255) NOT NULL,
  button_href VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS service_orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  meno VARCHAR(120) NOT NULL,
  kontakt VARCHAR(190) NOT NULL,
  zariadenie VARCHAR(190) NOT NULL,
  popis TEXT NOT NULL,
  service_type VARCHAR(40) NOT NULL,
  created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
