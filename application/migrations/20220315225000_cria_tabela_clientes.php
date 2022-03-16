<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_cria_tabela_clientes extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE
            ),
            'tipo_pessoa' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => FALSE
            ),
            'cpf_cnpj' => array(
                'type' => 'INT',
                'constraint' => '14',
                'null' => FALSE
            ),
            'rg_ie' => array(
                'type' => 'INT',
                'constraint' => '9',
                'null' => TRUE
            ),
            'sexo' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => FALSE
            ),
            'data_cadastro' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL
            ),
            'telefone' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => FALSE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE
            ),
            'observacoes' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'cep' => array(
                'type' => 'INT',
                'constraint' => '8',
                'null' => FALSE
            ),
            'logradouro' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE
            ),
            'numero' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => FALSE
            ),
            'complemento' => array(
                'type' => 'TEXT',
                'constraint' => '255',
                'null' => TRUE
            ),
            'bairro' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'uf' => array(
                'type' => 'VARCHAR',
                'constraint' => '2',
                'null' => FALSE
            ),
            'ibge' => array(
                'type' => 'INT',
                'constraint' => '7',
                'null' => FALSE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('clientes');
    }

    public function down() {
        $this->dbforge->drop_table('clientes');
    }
}
