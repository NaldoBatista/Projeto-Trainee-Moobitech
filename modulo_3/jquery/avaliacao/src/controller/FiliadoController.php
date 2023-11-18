<?php
use Moobi\Avaliacao\utils\SessionHandler;
use Moobi\Avaliacao\utils\Validacao;
use Moobi\Avaliacao\model\Filiado;
use Moobi\Avaliacao\model\FiliadoDao;
use Moobi\Avaliacao\model\DependenteDao;

class FiliadoController {

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
     * Faz o include do formulario para cadastrar um novo filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function save(array $aDados): void {
        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/cadastrar_filiado.php';
    }

    /**
     * Valida os campos do formulário e salva o filiado no banco 
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function cadastrarFiliado(array $aDados): void {
        $sNome = $aDados['nome'];
        $sCpf = $aDados['cpf'];
        $sRg = $aDados['rg'];
        $sDataNascimento = $aDados['data_nascimento'];
        $sEmpresa = $aDados['empresa'];
        $sCargo = $aDados['cargo'];
        $sSituacao = $aDados['situacao'];
        $sTelefoneResidencial = $aDados['telefone_residencial'];
        $sTelefoneCelular = $aDados['telefone_celular'];
        $tDataAtual = new DateTimeImmutable();
        $sDataUltimaAtualizacao = $tDataAtual->format('Y-m-d H:i:s');

        $bValidacao = $this->validarFiliado(
            $sNome,
            $sCpf,
            $sRg,
            $sDataNascimento,
            $sEmpresa,
            $sCargo,
            $sSituacao,
            $sTelefoneResidencial,
            $sTelefoneCelular
        );

        if (!$bValidacao) {
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/save');
            return; 
        }

        $oFiliado = new Filiado(
            $sNome,
            $sCpf,
            $sRg,
            $sDataNascimento,
            $sEmpresa,
            $sCargo,
            $sSituacao,
            $sTelefoneResidencial,
            $sTelefoneCelular,
            $sDataUltimaAtualizacao
        ); 

        $oFiliadoDao = new FiliadoDao();
        $iResultado = $oFiliadoDao->save($oFiliado);

        if ($iResultado > 0) {
            SessionHandler::setNotificacao('Filiado cadastrado com sucesso');
        } else {
            SessionHandler::setNotificacao('Filiado não cadastrado');
        }

        header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar');
    }

    /**
     * Carrega e lista todos os filiados de acordo os filtros
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function listar(array $aDados): void {

        //var_dump($aDados); 
        //exit();

        $oFiliadoDao = new FiliadoDao();
        $iNumeroRegistroFiliados = $oFiliadoDao->numeroRegistros($aDados);
        $iLimite = 4;
        $iNumeroPaginas = intval(ceil($iNumeroRegistroFiliados / $iLimite));
        $iPaginaAtual = intval(!empty($aDados['pagina']) ? $aDados['pagina']: 1);

        $aFiliados = $oFiliadoDao->findAll($aDados, $iPaginaAtual, $iLimite);
        $sNotificacao = SessionHandler::getNotificacao();

        $sNomeFiltro = $aDados['nome'];
        $sMesFiltro = $aDados['mes'];

        include __DIR__ .  '/../view/listar_filiados.php';
    }

    /**
     * Busca o filiado e faz a inclusaão do formulario para ediçao 
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $Dados
     * @return void
     * 
     * @since 1.0.0
     */
    public function editar(array $aDados): void {
        $iIdFiliado = $aDados['id'];

        $oFiliadoDao = new FiliadoDao();
        $aFiliado = $oFiliadoDao->findById($iIdFiliado);

        $oDependenteDao = new DependenteDao();
        $aDependentes = $oDependenteDao->findAll($iIdFiliado);

        $sNotificacao = SessionHandler::getNotificacao();

        if (empty($aFiliado)) {
            SessionHandler::setNotificacao('Filiado não encontrado');
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar');
        }

        include __DIR__ . '/../view/editar_filiado.php';
    }

    /**
     * Edita um filiado por uma modal
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param array $aDados
     * @return void
     *
     * @since 1.0.0
     */
    public function editarModal(array $aDados): void {
        $iIdFiliado = $aDados['id'];

        $oFiliadoDao = new FiliadoDao();
        $aFiliado = $oFiliadoDao->findById($iIdFiliado);

        $oDependenteDao = new DependenteDao();
        $aDependentes = $oDependenteDao->findAll($iIdFiliado);

        $sNotificacao = SessionHandler::getNotificacao();

        if (empty($aFiliado)) {
            SessionHandler::setNotificacao('Filiado não encontrado');
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar');
        }

        include __DIR__ . '/../view/modal/editar_filiado.php';
    }

    /**
     * Valida os campos do formulário e atualiza no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function atualizarFiliado(array $aDados): void {
        $sNome = $aDados['nome'];
        $sCpf = $aDados['cpf'];
        $sRg = $aDados['rg'];
        $sDataNascimento = $aDados['data_nascimento'];
        $sEmpresa = $aDados['empresa'];
        $sCargo = $aDados['cargo'];
        $sSituacao = $aDados['situacao'];
        $sTelefoneResidencial = $aDados['telefone_residencial'];
        $sTelefoneCelular = $aDados['telefone_celular'];
        $tDataAtual = new DateTimeImmutable();
        $sDataUltimaAtualizacao = $tDataAtual->format('Y-m-d H:i:s');
        $iIdFiliado = $aDados['id'];

        $bValidacao = $this->validarFiliado(
            $sNome,
            $sCpf,
            $sRg,
            $sDataNascimento,
            $sEmpresa,
            $sCargo,
            $sSituacao,
            $sTelefoneResidencial,
            $sTelefoneCelular
        );

        if (!$bValidacao) {
            header("Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/{$iIdFiliado}");
            return;
        }

            $oFiliado = new Filiado(
                $sNome,
                $sCpf,
                $sRg,
                $sDataNascimento,
                $sEmpresa,
                $sCargo,
                $sSituacao,
                $sTelefoneResidencial,
                $sTelefoneCelular,
                $sDataUltimaAtualizacao
            ); 
            
            $oFiliadoDao = new FiliadoDao();
            $iResultado = $oFiliadoDao->replace($oFiliado, $iIdFiliado);
            
            if ($iResultado > 0) {
                SessionHandler::setNotificacao('Filiado atualizado com sucesso.');
            } else {
                SessionHandler::setNotificacao('Falha ao atualizar filiado');
            }
            
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar');
    }

    /**
     * Busca e remove um filiado do banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function deleteFiliado(array $aDados): void {
        $iIdFiliado = $aDados['id'];

        $oFiliadoDao = new FiliadoDao();
        $iResultado = $oFiliadoDao->delete($iIdFiliado);

        if ($iResultado > 0) {
            SessionHandler::setNotificacao('Filiado excluido com sucesso!');
        } else {
            SessionHandler::setNotificacao('Falha ao excluido Filiado!');
        }

        header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar');
    }

    /**
     * Remove uma lista de Filiados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param array $aDados
     * @return void
     *
     * @since 1.0.0
     */
    public function deleteFiliados($aDados): void {
        if (!isset($aDados['id-lista'])) {
            return;
        }

        $aIdFiliados = $aDados['id-lista'];
        $oFiliadoDao = new FiliadoDao();

        foreach ($aIdFiliados as $iIdFiliado) {
            $oFiliadoDao->delete($iIdFiliado);
        };
        echo json_encode([ 'sucesso' => true, 'mensagem' => "Filiados deletados com sucesso"  ]);
    }

    /**
     * Valida os dados de um filiado 
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sNome
     * @param string $sCpf,
     * @param string $sRg,
     * @param string $sDataNascimento,
     * @param string $sEmpresa,
     * @param string $sCargo,
     * @param string $sSituacao,
     * @param string $sTelefoneResidencial,
     * @param string $sTelefoneCelular
     * @return bool
     * 
     * @since 1.0.0
     */
    private function validarFiliado(
        string $sNome,
        string $sCpf,
        string $sRg,
        string $sDataNascimento,
        string $sEmpresa,
        string $sCargo,
        string $sSituacao,
        string $sTelefoneResidencial,
        string $sTelefoneCelular
    ): bool{
        $bValidacao = true;
        if (!Validacao::nome($sNome)) {
            SessionHandler::setNotificacao('Informe um nome válido!');
            return false;
        }  
        if (!Validacao::cpf($sCpf)) {
            SessionHandler::setNotificacao('Informe um CPF válido!');
            return false;
        }  
        if (!Validacao::rg($sRg)) {
            SessionHandler::setNotificacao('Informe um RG válido!');
            return false;
        }  
        if (!Validacao::data($sDataNascimento)) {
            SessionHandler::setNotificacao('Informe um data de nascimento válida!');
            return false;
        }  
        if (!Validacao::empresa($sEmpresa)) {
            SessionHandler::setNotificacao('Informe um nome de empresa válido!');
            return false;
        }  
        if (!Validacao::cargo($sCargo)) {
            SessionHandler::setNotificacao('Informe um cargo válido!');
            return false;
        }  
         if (!Validacao::situacao($sSituacao)) {
            SessionHandler::setNotificacao('Informe uma situação válida!');
            return false;
        }  
         if (!Validacao::telefone($sTelefoneResidencial)) {
            SessionHandler::setNotificacao('Informe um telefone residencial válido!');
            return false;
        }  
         if (!Validacao::telefone($sTelefoneCelular)) {
            SessionHandler::setNotificacao('Informe um telefone celular válido!');
            $bValidacao = false;
        }

        return $bValidacao;
    }
}

?>