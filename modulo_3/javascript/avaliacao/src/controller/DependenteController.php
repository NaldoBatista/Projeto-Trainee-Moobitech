<?php
use Moobi\Avaliacao\utils\SessionHandler;
use Moobi\Avaliacao\utils\Validacao;
use Moobi\Avaliacao\model\Dependente;
use Moobi\Avaliacao\model\DependenteDao;

class DependenteController {

    public function __construct() {
        $aUsuario = SessionHandler::getUsuario();
        
        if (empty($aUsuario)) {
            header('Location: http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Login/login');
        }
    }
    public function save(array $aDados): void {
        $iIdFiliado = $aDados['id'];
        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/cadastrar_dependente.php';
    }

    public function cadastrarDependente(array $aDados): void {
        $iIdFiliado = $aDados['id'];
        $sNome = $aDados['nome'];
        $sDataNascimento = $aDados['data_nascimento'];
        $sGrauParentesco = $aDados['grau_parentesco'];

        $bValidacao = $this->validarDependente($sNome, $sDataNascimento, $sGrauParentesco);

        if (!$bValidacao) {
            header("Location: http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Dependente/save/{$iIdFiliado}");
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

        header("Location: http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/editar/{$iIdFiliado}");

        
    }

    public function edit(array $aDados): void {
        $iIdDependente = $aDados['id'];

        $oDependenteDao = new DependenteDao();
        $aDependente = $oDependenteDao->findById($iIdDependente);

        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/editar_dependente.php';
    }

    public function atualizarDependente(array $aDados): void {
        //var_dump($aDados);
        $sNome = $aDados['nome'];
        $aDataNascimento = $aDados['data_nascimento'];
        $sGrauParentesco = $aDados['grau_parentesco'];
        $iIdDependente = $aDados['id'];
        $iIdFiliado = $aDados['id_filiado'];

        $bValidacao = $this->validarDependente($sNome, $aDataNascimento, $sGrauParentesco);

        if (!$bValidacao) {
            header("Location: http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Dependente/edit/{$iIdDependente}");
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

        header("Location: http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/editar/{$iIdFiliado}");
    }

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

        header("Location: http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/editar/{$iIdFiliado}");
    }

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