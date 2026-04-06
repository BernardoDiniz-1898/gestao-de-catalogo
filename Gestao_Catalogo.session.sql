CREATE DATABASE gestao_catalogo;
USE gestao_catalogo;
CREATE TABLE equipamentos (
    id_equipamento INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    modelo VARCHAR(50),
    fabricante VARCHAR(50),
    numero_serie VARCHAR(50) UNIQUE,
    data_aquisicao DATE,
    status ENUM('Ativo', 'Manutenção', 'Inativo', 'Disponível') DEFAULT 'Disponível',
    valor_estimado DECIMAL(10, 2),
    descricao TEXT
);