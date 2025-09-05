<?php

    include_once DIR_UTIL . 'DefineCredenciais.php';
    include_once DIR_PERSISTENCIA . 'Seguranca.php';

    class Conexao {
        public static $conexao;

        private function __construct() {
        //
        }

        public static function connect() {
            Seguranca::antiInjectionPostGet();

            if (!isset(self::$conexao)) {
                self::$conexao = new PDO('mysql:host='.HOST_BD.';port='.PORT_BD.';dbname='.NAME_BD, USER_BD, KEY_BD);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexao->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            }
            return self::$conexao;
        }
    }
?>