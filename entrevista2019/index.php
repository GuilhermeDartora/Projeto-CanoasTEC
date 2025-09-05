<?php
include_once './base_dir.php';
include_once DIR_UTIL . 'Define.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>Entrevista</title>
    </head>
    <body>
        <header>
            <h1>Entrevista - Desenvolvimento Canoastec</h1>
        </header>

        <div class="conteudo">

            <div class="conteudo-instrucao">
                <h2>Instruções</h2>
                <p><strong>Configurações antes de codificar</strong></p>
                <p>
                    1 - No arquivo 'DefineCredenciais.php' definir as variaveis de acordo com as configurações do seu banco de dados local.
                    <p class="font10"></p>
                </p>
                <p>
                    2 - Criar um banco de dados chamado entrevista.
                    <p class="font10"></p>
                </p>
                <p>
                    3 - Importar os dados do arquivo 'entrevista.sql'.
                    <p class="font10"></p>
                </p>
                <p><strong>Modificar Tela de Listagem de Usuários</strong></p>
                <p>
                    1 - Exibir a data de cadastro no formato DD/MM/AAAA
                    <p class="font10"></p>
                </p>
                <p>
                    2 - Ter uma coluna de ações, com botões para editar e deletar
                    <p class="font10"></p>
                </p>
                <p>
                    3 - Em caso de não trazer registro, ter uma mensagem "nenhum registro encontrado" e não exibir a mensagem
                    <p class="font10"></p>      
                </p>
                <p>
                    4 - Criar uma area de filtro, que possa buscar por nome e cpf
                    <p class="font10"></p>      
                </p>
                <p>
                    5 - Exibir CPF no padrão ###.###.###-##
                    <p class="font10"></p>      
                </p>
                <br>
                <p><strong>Modificar Tela de Cadastro de Usuários</strong></p>
                <p>
                    1 - Criar validação para não permitir salvar sem preencher todos os campos
                    <p class="font10"></p>      
                </p>
                <p>
                    2 - Após salvar redirecionar para tela de listagem, e mostrar mensagem de sucesso.
                    <p class="font10"></p>      
                </p>
                <br>
                <p><strong>Novas Funcionalidades</strong></p>
                <p>
                    1 - Possibilitar deletar registro
                    <p class="font10"></p>      
                </p>
                <p>
                    2 - Possibilitar edição dos dados.
                    <p class="font10"></p>      
                </p>
                <p>
                    3 - Criar menu com acesso as telas de cadastro e listagem.
                    <p class="font10"></p>      
                </p>
                <p>
                    4 - Criar CRUD de perfil e fazer o relacionamento com usuário
                    <p class="font10"></p>      
                </p>
                <br>
                <p><strong>Melhorias não obrigatórias - Pontos Extras</strong></p>
                <p>
                    1 - Exibir na listagem o perfil do usuário
                    <p class="font10"></p>      
                </p>
                <p>
                    2 - Incluir e usar a biblioteca Bootstrap ou Materialize
                    <p class="font10"></p>      
                </p>
                <p>
                    3 - Incluir e usar a biblioteca Jquery ou Vue JS
                    <p class="font10"></p>      
                </p>
                <p>
                    4 - Nesta tela de instruções, criar checkbox para marcar que a tarefa foi concluida e salvar este estado sem usar a session do PHP e nem o banco de dados.
                    <p class="font10"></p>      
                </p>
                <p>
                    5 - Criar este mesmo projeto, só que utilizando o framework laravel
                    <p class="font10"></p>      
                </p>
                
            </div>

        </div>
    </body>
</html>

<style>
       
    .conteudo {    
        margin: 2em auto;
        width: 60%;
    }

    .conteudo-instrucao{
        border: 1px solid #ddd;
        border-top-left-radius: 1em;
        border-top-right-radius: 1em;
    }

    .conteudo-instrucao h2 {   
        margin-top: 0;
        border-top: 1em solid  #f8f8f8;
        border-bottom: 1em solid  #f8f8f8;
        border-top-left-radius: 0.7em;
        border-top-right-radius: 0.7em;
        background-color: #f8f8f8;
    }
    
    .conteudo-instrucao p {    
        padding: 0 1em;
    }
    
    .font10{
        font-size: 10pt;
    }

    .ok{
        color: green;
    }

    .nok{
        color: red;
    }

</style>
