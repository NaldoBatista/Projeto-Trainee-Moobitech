<?php
namespace Moobi\Avaliacao\utils;

class Validacao {
    public static function nome(string $sNome): bool {
        $mPadrao = "/^[a-zA-Zà-úÀ-Ú -]+$/";

        if (preg_match($mPadrao, $sNome)) {
            return true;
        };

        return false;
    }

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

    public static function rg(string $sRg): bool {
        $sRg = preg_replace('/[^0-9]/', '', $sRg);

        if (strlen($sRg) < 8) {
            return false;
        }

        return true;
    }

    public static function data(string $sData): bool {
        $sFormato = strpos($sData, ':') ? 'Y-m-d H:i:s' : 'Y-m-d';
        $oData = \DateTime::createFromFormat($sFormato, $sData);

        if ($oData && $oData->format($sFormato) == $sData) {
            return true;
        };

        return false;
    }

    public static function telefone(string $sTelefone): bool {
        $sTelefone = preg_replace('/[^0-9]/', '', $sTelefone);

        if (strlen($sTelefone) < 10) { 
            return false;
        };

        return true;
    }

    public static function empresa(string $sEmpresa): bool {
        $mPadrao = "/^[a-zA-Z0-9à-úÀ-Ú -]+$/";

        if (preg_match($mPadrao, $sEmpresa)) {
            return true;
        };

        return false;
    }

    public static function cargo(string $sCargo): bool {
        $mPadrao = "/^[a-zA-Zà-úÀ-Ú -]+$/";

        if (preg_match($mPadrao, $sCargo)) {
            return true;
        };

        return false;
    }

    public static function situacao(string $sSituacao): bool {
        $mPadrao = "/^[A-Za-zà-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sSituacao)) {
            return true;
        };

        return false;
    }

    public static function grauParentesco(string $sGrauParentesco): bool {
        $mPadrao = "/^[A-Za-zà-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sGrauParentesco)) {
            return true;
        };

        return false;
    }

    public static function senha(string $sSenha): bool {
        if (strlen($sSenha) < 6) {
            return false;
        };

        return true;
    }

    public static function login(string $sLogin): bool {
        $mPadrao = "/^[A-Za-z0-9à-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sLogin)) {
            return true;
        }

        return false;
    }

    public static function nivelAcesso(string $sNivelAcesso): bool {
        $mPadrao = "/^[A-Za-zà-úÀ-Ú]+$/";

        if (preg_match($mPadrao, $sNivelAcesso)) {
            return true;
        };

        return false;
    }

}

?>