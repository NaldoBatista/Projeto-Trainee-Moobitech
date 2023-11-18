<div>
    
    <h1>Cadastrar Usuário</h1>
    
    <form action="http://localhost/programa_de_trainee/modulo_2/login/Login/cadastrarUsuario"
        method="post">
        
        <label for="">Usuario:</label>
        <input type="text" name="usuario">
        <br>

        <label for="">Senha:</label>
        <input type="password" name="senha">
        <br>

        <label for="">Nível de Acesso</label>
        <input type="number" min="0" max="1" step="1" name="nivel_acesso">
        <br>

        <button>cadastrar</button>
        
    </form>
</div>