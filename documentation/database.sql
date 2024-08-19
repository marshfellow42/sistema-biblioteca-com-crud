CREATE TABLE IF NOT EXISTS USUARIOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60),
    email VARCHAR(60),
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
    nome VARCHAR(50),
    capa VARCHAR(50),
    autor VARCHAR(50),
    genero VARCHAR(30),
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

CREATE TABLE IF NOT EXISTS EMPRESTIMOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuarioId INT,
    livroId INT,
    dataEmprestimo DATE,
    dataPrevistaDevolucao DATE,
    status VARCHAR(20),
    createdIn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    isDeleted TINYINT(1) DEFAULT NULL,
    deletedAt TIMESTAMP NULL,
    FOREIGN KEY (usuarioId) REFERENCES USUARIOS(id),
    FOREIGN KEY (livroId) REFERENCES LIVROS(id)
);

CREATE TABLE IF NOT EXISTS DEVOLUCAO (
    id INT AUTO_INCREMENT PRIMARY KEY,
    emprestimoId INT,
    valorPago DECIMAL(10,2),
    dataDevolucao DATE,
    valorTotal DECIMAL(10,2),
    valorMulta DECIMAL(10,2),
    createdIn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    isDeleted TINYINT(1) DEFAULT NULL,
    deletedAt TIMESTAMP NULL,
    FOREIGN KEY (emprestimoId) REFERENCES EMPRESTIMOS(id)
);