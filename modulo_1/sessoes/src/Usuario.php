<?php

class Usuario {
    private $mysqli;

    public function __construct(mysqli $mysqli) {
        $this->mysqli = $mysqli;
    }

    public function adicionarUsuario(string $nome, string $usuario, string $senha) {
        $stm = $this->mysqli->prepare('INSERT INTO tb_usuario(nome, usuario, senha) VALUES(?, ?, ?)');
        $stm->bind_param('sss', $nome, $usuario, $senha);
        $stm->execute();
    }

    public function exibirTodos() {
        $stm = $this->mysqli->query('SELECT * FROM tb_usuario');
        $usuarios = $stm->fetch_all(MYSQLI_ASSOC);
        return $usuarios;
    }
}

?>