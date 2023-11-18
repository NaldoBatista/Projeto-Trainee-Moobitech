<?php
use Moobi\Avaliacao\utils\SessionHandler;
use Moobi\Avaliacao\utils\Validacao;
use Moobi\Avaliacao\model\Dependente;
use Moobi\Avaliacao\model\DependenteDao;

class DependenteController {

    /**
     * Verifica se o usuario está logado 
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @since 1.0.0 
     */
    public function __construct() {
        $aUsuario = SessionHandler::getUsuario();
        
        if (empty($aUsuario)) {
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Login/login');
        }
    }

    /**
     * Faz a inclusão do formulario para cadastrar um novo usuario
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0 
     */
    public function save(array $aDados): void {
        $iIdFiliado = $aDados['id'];
        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/cadastrar_dependente.php';
    }

    /**
     * Cadastra um novo dependente pela modal
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param array $aDados
     * @return void
     *
     * @since 1.0.0
     */
    public function saveModal(array $aDados): void {

        //var_dump($aDados); 
        //exit();

        $iIdFiliado = $aDados['id'];
        //$sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/modal/cadastrar_dependente.php';
    }

    /**
     * Valida os campos do dependente enviados pelo formulario e salva no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0 
     */
    public function cadastrarDependente(array $aDados): void {
        $iIdFiliado = $aDados['id'];
        $sNome = $aDados['nome'];
        $sDataNascimento = $aDados['data_nascimento'];
        $sGrauParentesco = $aDados['grau_parentesco'];

        $bValidacao = $this->validarDependente($sNome, $sDataNascimento, $sGrauParentesco);

        if (!$bValidacao) {
            header("Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/save/{$iIdFiliado}");
            return;
        }

        $oDependente = new Dependente(
            $sNome,
            $sDataNascimento,
            $sGrauParentesco
        );

        $oDependenteDao = new DependenteDao();
        $iResultado = $oDependenteDao->save($oDependente, $iIdFiliado);

        if ($iResultado > 0) {
            SessionHandler::setNotificacao('Dependente cadastrado com sucesso');
        } else {
            SessionHandler::setNotificacao('Falha ao cadastrar dependente');
        }

        header("Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/{$iIdFiliado}");
    }

    /**
     * Faz a inclusão do formulário de edição do dependente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0 
     */
    public function edit(array $aDados): void {
        $iIdDependente = $aDados['id'];

        $oDependenteDao = new DependenteDao();
        $aDependente = $oDependenteDao->findById($iIdDependente);

        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/editar_dependente.php';
    }

    /**
     * Renderiza a view da modal para edição do dependente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param array $aDados
     * @return void
     *
     * @since 1.0.0
     */
    public function editModal(array $aDados): void {
        $iIdDependente = $aDados['id'];

        $oDependenteDao = new DependenteDao();
        $aDependente = $oDependenteDao->findById($iIdDependente);

        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/modal/editar_dependente.php';
    }

    /**
     * Valida os campos do dependente enviados pelo formulario e atualiza o dependente no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0 
     */
    public function atualizarDependente(array $aDados): void {
        $sNome = $aDados['nome'];
        $aDataNascimento = $aDados['data_nascimento'];
        $sGrauParentesco = $aDados['grau_parentesco'];
        $iIdDependente = $aDados['id'];
        $iIdFiliado = $aDados['id_filiado'];

        $bValidacao = $this->validarDependente($sNome, $aDataNascimento, $sGrauParentesco);

        if (!$bValidacao) {
            header("Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/edit/{$iIdDependente}");
            return;
        }

        $oDependente = new Dependente(
            $sNome,
            $aDataNascimento,
            $sGrauParentesco
        );

        $oDependenteDao = new DependenteDao();
        $iResultado = $oDependenteDao->replace($oDependente, $iIdDependente);

        if ($iResultado > 0) {
            SessionHandler::setNotificacao('Dependente atualizado com sucesso');
        } else {
            SessionHandler::setNotificacao('Falha ao atualizar dependente');
        }

        header("Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/{$iIdFiliado}");
    }

    /**
     *  Remove um dependente do banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0 
     */
    public function deleteDependente(array $aDados): void {
        $iIdDependente = $aDados['id'];
        $oDependenteDao = new DependenteDao();
        $aDependente = $oDependenteDao->findById($iIdDependente);
        $iIdFiliado = $aDependente['flo_id'];
        $iResultado = $oDependenteDao->delete($iIdDependente);

        if ($iResultado > 0) {
            SessionHandler::setNotificacao('Dependente excluido com sucesso');
        } else {
            SessionHandler::setNotificacao('Falha ao excluir dependente');
        }

        header("Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/{$iIdFiliado}");
    }

    /**
     * Valida os dados de um dependente 
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sNome
     * @param string $sDataNascimento
     * @param string $sGrauParentesco
     * @return bool
     * 
     * @since 1.0.0 
     */
    private function validarDependente(string $sNome, string $sDataNascimento, string $sGrauParentesco): bool {
        if (!Validacao::nome($sNome)) {
            SessionHandler::setNotificacao('Informe um nome válido!');
            return false;
        } 
        
        if (!Validacao::data($sDataNascimento)) {
            SessionHandler::setNotificacao('Informe um data de nascimento válida!');
            return false;
        } 
        if (!Validacao::grauParentesco($sGrauParentesco)) {
            SessionHandler::setNotificacao('Informe um grau de parentesco válido!');
            return false;
        }

        return true;
    }

}
?>