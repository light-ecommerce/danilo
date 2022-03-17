<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alterar_data_helper {

    public function __construct() {
        $this->load->helper('date');
    }

    public function retornaData() {
        $this->load->helper('date');

        $dateString = "%Y-%m-%d %h:%i:%s";
        $time = now('America/Sao_Paulo');
        return mdate($dateString, $time);
    }

}

