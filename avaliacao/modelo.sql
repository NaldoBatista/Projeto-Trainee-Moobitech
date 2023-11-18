CREATE DATABASE naldo_batista
    DEFAULT CHARACTER SET = 'utf8mb4';


CREATE TABLE uso_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uso_login VARCHAR(50),
    uso_senha VARCHAR(250),
    uso_nivel_acesso VARCHAR(50)
);

CREATE TABLE flo_filiado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flo_nome VARCHAR(50),
    flo_cpf VARCHAR(50),
    flo_rg VARCHAR(50),
    flo_data_nascimento DATE,
    flo_idade INT,
    flo_empresa VARCHAR(50),
    flo_cargo VARCHAR(50),
    flo_situacao VARCHAR(50),
    flo_telefone_residencial VARCHAR(50),
    flo_telefone_celular VARCHAR(50),
    flo_data_ultima_atualizacao DATETIME
);

CREATE TABLE dpe_dependente (
    id int AUTO_INCREMENT PRIMARY KEY,
    dpe_nome VARCHAR(50),
    dpe_data_nascimento DATE,
    dpe_idade INT,
    dpe_grau_parentesco VARCHAR(50),
    flo_id INT,
    FOREIGN KEY (flo_id) REFERENCES flo_filiado(id) ON DELETE CASCADE
);



