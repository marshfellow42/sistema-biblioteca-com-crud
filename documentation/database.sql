CREATE TABLE IF NOT EXISTS USUARIOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome TEXT,
    email TEXT,
    senha TEXT,
    contato VARCHAR(25),
    dtNasc DATE,
    tipoUser VARCHAR(1),
    cgc VARCHAR(14),
    createdIn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    isDeleted TINYINT(1) DEFAULT NULL,
    deletedAt TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS LIVROS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome TEXT,
    capa TEXT,
    autor TEXT,
    genero TEXT,
    classificacao VARCHAR(5),
    descricao TEXT,
    dataDePublicacao DATE,
    valorDiario DECIMAL(10,2),
    valorMulta DECIMAL(10,2),
    quantidade INT(3),
    createdIn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    isDeleted TINYINT(1) DEFAULT NULL,
    deletedAt TIMESTAMP NULL
);