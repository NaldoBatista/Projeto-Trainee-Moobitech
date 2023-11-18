<?php
namespace Moobi\Avaliacao\utils;

class Validacao {

    /**
     * Valida o nome de uma pessoa
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sNome
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function nome(string $sNome): bool {
        $mPadrao = "/^[a-zA-Zà-úÀ-Ú -]+$/";

        if (preg_match($mPadrao, $sNome)) {
            return true;
        };

        return false;
    }

    /**
     * Valida um cpf
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sCpf
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function cpf(string $sCpf): bool {
        $sCpf = preg_replace( '/[^0-9]/is', '', $sCpf );
        
        if (strlen($sCpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $sCpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $sCpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($sCpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    /**
     * Valida um RG
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sRG
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function rg(string $sRg): bool {
        $sRg = preg_replace('/[^0-9]/', '', $sRg);

        if (strlen($sRg) < 8) {
            return false;
        }

        return true;
    }

    /**
     * Valida uma data
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sData
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function data(string $sData): bool {
        $sFormato = strpos($sData, ':') ? 'Y-m-d H:i:s' : 'Y-m-d';
        $oData = \DateTime::createFromFormat($sFormato, $sData);

        if ($oData && $oData->format($sFormato) == $sData) {
            return true;
        };

        return false;
    }

    /**
     * Valida um telefone
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sTelefone
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function telefone(string $sTelefone): bool {
        $sTelefone = preg_replace('/[^0-9]/', '', $sTelefone);

        if (strlen($sTelefone) < 10) { 
            return false;
        };

        return true;
    }

    /**
     * Valida o nome de uma empresa
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sEmpresa
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function empresa(string $sEmpresa): bool {
        $mPadrao = "/^[a-zA-Z0-9à-úÀ-Ú -]+$/";

        if (preg_match($mPadrao, $sEmpresa)) {
            return true;
        };

        return false;
    }

    /**
     * Valida um cargo
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sCargo
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function cargo(string $sCargo): bool {
        $mPadrao = "/^[a-zA-Zà-úÀ-Ú -]+$/";

        if (preg_match($mPadrao, $sCargo)) {
            return true;
        };

        return false;
    }

    /**
     * Valida a situação de uma pessoa
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sNome
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function situacao(string $sSituacao): bool {
        $mPadrao = "/^[A-Za-zà-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sSituacao)) {
            return true;
        };

        return false;
    }

    /**
     * Valida um grau de parentesco
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sGrauParentesco
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function grauParentesco(string $sGrauParentesco): bool {
        $mPadrao = "/^[A-Za-zà-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sGrauParentesco)) {
            return true;
        };

        return false;
    }

    /**
     * Valida uma senha
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sSenha
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function senha(string $sSenha): bool {
        if (strlen($sSenha) < 6) {
            return false;
        };

        return true;
    }

    /**
     * Valida um login
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sLogin
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function login(string $sLogin): bool {
        $mPadrao = "/^[A-Za-z0-9à-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sLogin)) {
            return true;
        }

        return false;
    }

    /**
     * Valida o nível de acesso
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sNivelAcesso
     * @return bool
     * 
     * @since 1.0.0
     */
    public static function nivelAcesso(string $sNivelAcesso): bool {
        $mPadrao = "/^[A-Za-zà-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sNivelAcesso)) {
            return true;
        };

        return false;
    }

}

?>