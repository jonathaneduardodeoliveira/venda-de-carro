-- Criação do banco de dados
CREATE DATABASE venda_de_carro;

-- Seleção do banco de dados para uso
USE venda_de_carro;

-- Criação da tabela clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20)
);

-- Verificação das tabelas existentes
SHOW TABLES;
