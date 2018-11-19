<?php

class Rota {

    private $id_rota;
    private $url;
    private $conteudo;
    private $matriz;
    private $publico;
    private $expressao;

    function select_rota() {
        $query = "
            SELECT
                id_rota,
                matriz,
                conteudo,
                publico,
                expressao
            FROM rotas 
            WHERE TRUE
                AND url = '{$this->get_url()}'
                AND ativo = '1'
        ";
        return DATABASE::fetch_all($query);
    }

    function select_rota_from_id() {
        $query = "
            SELECT
                id_rota,
                matriz,
                conteudo,
                publico,
                expressao,
                url
            FROM rotas
            WHERE TRUE
                AND id_rota = '{$this->get_id_rota()}'
        ";
        return DATABASE::fetch($query);
    }

    function select_all_rotas($order = 'DESC') {
        $query = "
            SELECT 
                id_rota,
                url,
                matriz,
                conteudo,
                publico,
                ativo,
                expressao
            FROM rotas
            WHERE TRUE
            ORDER BY id_rota $order
        ";
        return DATABASE::fetch_all($query);
    }

    function get_arquivos_base() {
        $dir = "Public/Matriz/";
        $filelist = scandir($dir);
        foreach ($filelist as $key => $file) {
            if (!is_file($dir . $file)) {
                unset($filelist[$key]);
            }
        }
        $filelist = array_values($filelist);
        return $this->organize_matriz_array($filelist);
    }

    function organize_matriz_array($arquivos_base) {
        if ($arquivos_base) {
            foreach ($arquivos_base as $key => $base) {
                $arquivo['arquivo'] = $base;

                if ($base == "base_interface.php") {
                    $arquivo['nome'] = "Página de administração";
                    $arquivos_base[$key] = $arquivo;
                } else if ($base == "base_geral.php") {
                    $arquivo['nome'] = "Página do site";
                    $arquivos_base[$key] = $arquivo;
                } else {
                    unset($arquivos_base[$key]);
                }
            }
            $arquivos_base = array_values($arquivos_base);
        }
        return $arquivos_base;
    }

    function get_arquivos_conteudo() {
        $conteudo = array();
        $dir = "Core/Rotas/";
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
        foreach ($iterator as $file) {
            if ($file->isDir()) {
                continue;
            }
            $path = str_replace("\\", "/", $file->getPathname());
            $path = str_replace("Core/Rotas/", "", $path);
            array_push($conteudo, $path);
        }
        return $conteudo;
    }

    function select_conteudo() {
        $query = "
            SELECT
                id_rota
            FROM rotas 
            WHERE TRUE
                AND conteudo = '{$this->get_conteudo()}'
                AND ativo = '1'
        ";
        return DATABASE::fetch($query);
    }

    function insert_rota() {
        $query = "
            INSERT INTO rotas
            (url, matriz, conteudo, publico, expressao)
            VALUES(
                '{$this->get_url()}',
                '{$this->get_matriz()}',
                '{$this->get_conteudo()}',
                '{$this->get_publico()}',
                '{$this->get_expressao()}'
            )
        ";
        DATABASE::execute($query);
    }

    function save_on_htaccess($params = array()) {
        $expressoes = "";
        $query_string = "";
        if ($params) {
            $query_index = 1;
            foreach ($params as $param) {
                if ($param['tipo'] == "1") {

                    if ($param['expressao'] == "INT") {
                        $param['expressao'] = "(\d+)";
                    } else {
                        $param['expressao'] = "([a-zA-Z0-9\-]+)";
                    }

                    $query_string = empty($query_string) ? "?" : "{$query_string}&";
                    $expressoes .= "\/{$param['expressao']}";
                    $query_string .= $param['nome'] . '=$' . ($query_index);
                    $query_index++;
                } else {
                    $expressoes .= "\/{$param['palavra']}";
                }
            }
        }
        $regex_final = "^{$this->get_url()}{$expressoes}\/?$";
        $data = PHP_EOL . "rewriteRule $regex_final ./index.php{$query_string} [NC]";
        $fp = fopen('.htaccess', 'a');
        fwrite($fp, $data);
        return $regex_final;
    }

    function rebuild_htaccess() {
        $all_rotas = $this->select_all_rotas('ASC');
        $this->clear_htaccess();
        $fp = fopen('.htaccess', 'a');
        fwrite($fp, "rewriteEngine on" . PHP_EOL);
        fwrite($fp, "rewriteEngine on" . PHP_EOL);
        fwrite($fp, "rewriteCond %{SCRIPT_FILENAME} !-f" . PHP_EOL);
        fwrite($fp, "rewriteCond %{SCRIPT_FILENAME} !-d" . PHP_EOL);
        fwrite($fp, "Options -Indexes" . PHP_EOL);
        foreach ($all_rotas as $rota) {
            $regex_final = "{$rota['expressao']}";
            $data = PHP_EOL . "rewriteRule $regex_final ./index.php [NC]";
            fwrite($fp, $data);
        }
        fwrite($fp, PHP_EOL . "rewriteRule ^\/?$ .\/index.php [NC]" . PHP_EOL);
        fclose($fp);
    }

    function clear_htaccess() {
        $fp = fopen('.htaccess', 'w');
        fwrite($fp, "");
        fclose($fp);
    }

    function alterar_status_rota() {
        $query = "
            UPDATE rotas 
            SET ativo = !ativo 
            WHERE TRUE 
                AND id_rota = '{$this->getId()}'
        ";
        DATABASE::execute($query);
    }

    function delete_rota() {
        $query = "
            DELETE FROM
            rotas
            WHERE TRUE
                AND id_rota = '{$this->getId()}'
        ";
        DATABASE::execute($query);
    }

    /**
     * Eu não criei um modelo 'Parametro' porque
     * parâmetro é um entidade fraca 
     * (depende de outra entidade pra existir, 'Rota' neste caso)
     * por isso não há necessidade de criar outro modelo.
     */
    function select_parametros() {
        $query = "
            SELECT 
                indice, parametro, tipo
            FROM rotas_parametros
            WHERE fk_rota = '{$this->get_id_rota()}'
        ";
        return Database::fetch_all($query);
    }

    function get_id_rota() {
        return $this->id_rota;
    }

    function set_id_rota($id_rota) {
        $this->id_rota = $id_rota;
    }

    function get_url() {
        return $this->url;
    }

    function get_conteudo() {
        return $this->conteudo;
    }

    function get_matriz() {
        return $this->matriz;
    }

    function get_publico() {
        return $this->publico;
    }

    function set_url($url) {
        $this->url = $url;
    }

    function set_conteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function set_matriz($matriz) {
        $this->matriz = $matriz;
    }

    function set_publico($publico) {
        $this->publico = $publico;
    }

    function get_expressao() {
        return $this->expressao;
    }

    function set_expressao($expressao) {
        $this->expressao = STRINGS::limpar($expressao);
    }

}
