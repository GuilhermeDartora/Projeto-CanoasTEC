<?php

include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';

class UsuarioDAO {
    
    private $conexao = null;
    
    function __construct() {
    }
    
    public function listar(string $nome = '', string $cpf = ''): array{
    try {
        $pdo = Conexao::connect();

        $sql = "SELECT * FROM usuario u WHERE 1=1";
        $params = [];

        if ($nome !== '') {
            $sql .= " AND u.nm_usuario LIKE :nome";
            $params[':nome'] = '%'.$nome.'%';
        }

        if ($cpf !== '') {
            // compara apenas dígitos
            $cpfDigits = preg_replace('/\D+/', '', $cpf);
            $sql .= " AND REPLACE(REPLACE(REPLACE(u.nr_cpf,'.',''),'-',''),' ','') LIKE :cpf";
            $params[':cpf'] = '%'.$cpfDigits.'%';
        }

        $sql .= " ORDER BY u.nm_usuario ASC";

        $st = $pdo->prepare($sql);
        $st->execute($params);
        $array = $st->fetchAll(PDO::FETCH_ASSOC);

        $usuarios = [];
        foreach ($array as $obj) {
            $usuario = new UsuarioVO();
            $usuario->setIdUsuario($obj['id_usuario']);
            $usuario->setNmUsuario($obj['nm_usuario']);
            $usuario->setNrCpf($obj['nr_cpf']);
            $usuario->setDsEmail($obj['ds_email']);
            $usuario->setDsLogin($obj['ds_login']);
            $usuario->setPwSenha($obj['pw_senha']);
            $usuario->setIdPerfil($obj['id_perfil']);
            $usuario->setAoStatus($obj['ao_status']);
            $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
            $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
            $usuario->setDtCadastro($obj['dt_cadastro']);
            $usuario->setDtAlteracao($obj['dt_alteracao']);
            $usuarios[] = $usuario;
        }

        return $usuarios;

    } catch (Exception $e) {
        // você pode logar $e->getMessage()
        return [];
    }
}

 

    function cadastrar(UsuarioVO $usuario){
        try{

            $sql = "
                INSERT INTO usuario(
                    nm_usuario,
                    ds_email,
                    nr_cpf,
                    ds_login,
                    pw_senha,
                    id_perfil,
                    ao_status,
                    id_usuarioinclusao,
                    id_usuarioalteracao,
                    dt_cadastro,
                    dt_alteracao
                )VALUES(
                    '{$usuario->getNmUsuario()}',
                    '{$usuario->getDsEmail()}',
                    '{$usuario->getNrCpf()}',
                    '{$usuario->getDsLogin()}',
                    '{$usuario->getPwSenha()}',
                    '{$usuario->getIdPerfil()}',
                    '{$usuario->getAoStatus()}',
                    '{$usuario->getIdUsuarioInclusao()}',
                    '{$usuario->getIdUsuarioAlteracao()}',
                    now(),
                    now()
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar o Usuario";
            return false;
        }
    }

    public function buscar(int $id): ?UsuarioVO
        {
            try {
                $sql = "SELECT * FROM usuario WHERE id_usuario = :id LIMIT 1";
                $pdo = Conexao::connect();
                $st  = $pdo->prepare($sql);
                $st->bindValue(':id', $id, PDO::PARAM_INT);
                $st->execute();

                $row = $st->fetch(PDO::FETCH_ASSOC);
                if (!$row) return null;

                $u = new UsuarioVO();
                $u->setIdUsuario($row['id_usuario']);
                $u->setNmUsuario($row['nm_usuario']);
                $u->setNrCpf($row['nr_cpf']);
                $u->setDsEmail($row['ds_email']);
                $u->setDsLogin($row['ds_login']);
                $u->setPwSenha($row['pw_senha']);
                $u->setIdPerfil($row['id_perfil']);
                $u->setAoStatus($row['ao_status']);
                $u->setIdUsuarioinclusao($row['id_usuarioinclusao']);
                $u->setIdUsuarioalteracao($row['id_usuarioalteracao']);
                $u->setDtCadastro($row['dt_cadastro']);
                $u->setDtAlteracao($row['dt_alteracao']);

                return $u;
            } catch (Exception $e) {
                return null;
            }
        }

    public function atualizar(UsuarioVO $u): bool {

            try {
                $pdo = Conexao::connect();

                $sql = "UPDATE usuario SET
                        nm_usuario = :nm,
                        nr_cpf     = :cpf,
                        ds_email   = :email,
                        ds_login   = :login,
                        id_perfil  = :perfil,
                        ao_status  = :status,
                        id_usuarioalteracao = :usralt,
                        dt_alteracao = NOW()";

                $params = [
                ':nm'    => $u->getNmUsuario(),
                ':cpf'   => $u->getNrCpf(),
                ':email' => $u->getDsEmail(),
                ':login' => $u->getDsLogin(),
                ':perfil'=> $u->getIdPerfil(),
                ':status'=> $u->getAoStatus(),
                ':usralt'=> $u->getIdUsuarioAlteracao(),
                ':id'    => $u->getIdUsuario(),
                ];

                // atualiza a senha só se veio preenchida
                if ($u->getPwSenha() !== '') {
                    $sql .= ", pw_senha = :senha";
                    $params[':senha'] = $u->getPwSenha();
                }

                $sql .= " WHERE id_usuario = :id";

                $st = $pdo->prepare($sql);
                return $st->execute($params);

            } catch (Exception $e) {
                return false;
            }
        }

        public function deletar(int $id): bool {
            try {
                $pdo = Conexao::connect();
                $st  = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id");
                return $st->execute([':id'=>$id]);
            } catch (Exception $e) {
                return false;
            }
        }



}
