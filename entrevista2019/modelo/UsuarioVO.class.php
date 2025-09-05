<?php

class UsuarioVO {
    
    private $id_usuario;
    private $nm_usuario;
    private $nr_cpf;
    private $ds_email;
    private $ds_login;
    private $pw_senha;
    private $id_perfil;
    private $ao_status;
    private $id_usuarioinclusao;
    private $id_usuarioalteracao;
    private $dt_cadastro;
    private $dt_alteracao;
    
    public function __get($a) {
        return $this->$a;
    }

    public function __set($a, $v) {
        $this->$a = $v;
    }

    function getIdUsuario() {
        return $this->id_usuario;
    }

    function getIdPerfil() {
        return $this->id_perfil;
    }

    function getIdUsuarioInclusao() {
        return $this->id_usuarioinclusao;
    }

    function getIdUsuarioAlteracao() {
        return $this->id_usuarioalteracao;
    }

    function getDtCadastro() {
        return $this->dt_cadastro;
    }

    function getDtAlteracao() {
        return $this->dt_alteracao;
    }

    function getNmUsuario() {
        return $this->nm_usuario;
    }

    function getAoStatus() {
        return $this->ao_status;
    }

    function getDsLogin() {
        return $this->ds_login;
    }

    function getPwSenha() {
        return $this->pw_senha;
    }

    function getNrCpf() {
        return $this->nr_cpf;
    }

    function getDsEmail() {
        return $this->ds_email;
    }

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setIdPerfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    function setIdUsuarioInclusao($id_usuarioinclusao) {
        $this->id_usuarioinclusao = $id_usuarioinclusao;
    }

    function setIdUsuarioAlteracao($id_usuarioalteracao) {
        $this->id_usuarioalteracao = $id_usuarioalteracao;
    }

    function setDtCadastro($dt_cadastro) {
        $this->dt_cadastro = $dt_cadastro;
    }

    function setDtAlteracao($dt_alteracao) {
        $this->dt_alteracao = $dt_alteracao;
    }

    function setNmUsuario($nm_usuario) {
        $this->nm_usuario = $nm_usuario;
    }

    function setAoStatus($ao_status) {
        $this->ao_status = $ao_status;
    }

    function setDsLogin($ds_login) {
        $this->ds_login = $ds_login;
    }

    function setPwSenha($pw_senha) {
        $this->pw_senha = $pw_senha;
    }

    function setNrCpf($nr_cpf) {
        $this->nr_cpf = $nr_cpf;
    }

    function setDsEmail($ds_email) {
        $this->ds_email = $ds_email;
    }
}
