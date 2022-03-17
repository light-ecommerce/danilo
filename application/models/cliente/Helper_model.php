<?php

class Helper_model extends CI_Model {

    public function retornaData() {
        $dateString = "%Y-%m-%d %h:%i:%s";
        $time = now('America/Sao_Paulo');
        return mdate($dateString, $time);
    }

    public function mascaraTelefone($telefone) {
        $telefone = preg_replace("/[^0-9]/ ","", $telefone);
        $numeroDigitos = strlen($telefone);

        if($numeroDigitos == 10) {
            $mascara = "(##)####-####";
        } elseif($numeroDigitos == 11) {
            $mascara = "(##)#####-####";
        } else {
            return "Caracteres inválidos";
            die();
        }

        for($i = 0; $i < $numeroDigitos; $i++) {
            $mascara[strpos($mascara,"#")] = $telefone[$i];
        }

        return $mascara;
    }

    public function mascaraCpfCnpj($numero) {
        $numero = preg_replace("/[^0-9]/ ","", $numero);
        $numeroDigitos = strlen($numero);

        if($numeroDigitos == 11) {
            $mascara = "###.###.###-##";
        } elseif($numeroDigitos == 14) {
            $mascara = "##.###.###/####-##";
        } else {
            return "Numero de Caracteres inválidos";
            die();
        }
        
        for($i = 0; $i < $numeroDigitos; $i++) {
            $mascara[strpos($mascara,"#")] = $numero[$i];
        }

        return $mascara;
    }

    public function mascaraRgIe($numero) {
        $numero = preg_replace("/[^A-Za-z0-9]/","", $numero);
        $numeroDigitos = strlen($numero);

        if($numeroDigitos == 9) {
            $mascara = "##.###.###-#";
        } elseif($numeroDigitos == 12) {
            $mascara = "###.###.###.###";
        } else {
            return "Numero de Caracteres inválidos";
            die();
        }
        
        for($i = 0; $i < $numeroDigitos; $i++) {
            $mascara[strpos($mascara,"#")] = $numero[$i];
        }

        return $mascara;
    }

}
