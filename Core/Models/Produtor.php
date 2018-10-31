<?php

    class Produtor{
        private $cpf;                    
        private $rg;          
        private $cad_pro;         
        private $data_nascimento;              
        private $cidade;           
        private $bairro;            
        private $rua;               
        private $numero;           
        private $complemento;
        private $id_usuario;
        
        public function estados(){
            $query = "SELECT * FROM estados";
            return Database::fetch_all($query);
        }
        
        public function cidades(){
            $query = "SELECT id_municipio, nome, uf FROM municipios";
            return Database::fetch_all($query);
        }
        
        function insert_usuario_produtor(){
            $query = "INSERT INTO
                        produtores
                        (fk_usuario, cpf, rg, cadpro, data_nascimento)
                     VALUES 
                       ('{$this->get_id_usuario()}',
                        '{$this->get_cpf()}',
                        '{$this->get_rg()}',
                        '{$this->get_cad_pro()}',
                        '{$this->get_data_nascimento()}')";
                        
            Database::execute($query);
                    
            $query_end = "INSERT INTO
                enderecos
                (fk_usuario, fk_cidade, bairro, rua, numero, complemento, ativo)
             VALUES 
               ('{$this->get_id_usuario()}',
                '{$this->get_cidade()}',
                '{$this->get_bairro()}',
                '{$this->get_rua()}',
                '{$this->get_numero()}',
                '{$this->get_complemento()}',
                '1')";
            Database::execute($query_end);       
        }
        
        function get_id_usuario(){
            $this->id_usuario = $_SESSION['id'];
            return $this->id_usuario;
        }
        
        function get_cpf() {
            return $this->cpf;
        }

        function get_rg() {
            return $this->rg;
        }

        function get_cad_pro() {
            return $this->cad_pro;
        }

        function get_data_nascimento() {
            return $this->data_nascimento;
        }

        function get_cidade() {
            return $this->cidade;
        }

        function get_bairro() {
            return $this->bairro;
        }

        function get_rua() {
            return $this->rua;
        }

        function get_numero() {
            return $this->numero;
        }

        function get_complemento() {
            return $this->complemento;
        }

        function set_cpf($cpf) {
            $this->cpf = Strings::limpar($cpf);
        }

        function set_rg($rg) {
            $this->rg = Strings::limpar($rg);
        }

        function set_cad_pro($cad_pro) {
            $this->cad_pro = Strings::limpar($cad_pro);
        }

        function set_data_nascimento($data_nascimento) {
            $this->data_nascimento = Strings::limpar($data_nascimento);
        }

        function set_cidade($cidade) {
            $this->cidade = Strings::limpar($cidade);
        }

        function set_bairro($bairro) {
            $this->bairro = Strings::limpar($bairro);
        }

        function set_rua($rua) {
            $this->rua = Strings::limpar($rua);
        }

        function set_numero($numero) {
            $this->numero = Strings::limpar($numero);
        }

        function set_complemento($complemento) {
            $this->complemento = Strings::limpar($complemento);
        }
    }