<?php
    //Se o usuario tiver email ou usuario ja registrados
    if (isset($_SESSION['exite_valor'])) {
        echo "Usuario e senha ja registrados no sistema";
    } else {    
    }
    unset($_SESSION['exite_valor']);

    //Se o usuario errar o usuario ou senha
    if (isset($_SESSION['auth_first'])) {
        echo "Erro no usuário ou senha";
    } else {
    }
    unset($_SESSION['auth_first']);

    //Mensagem de registro
    if (isset($_SESSION['perfil_criado'])) {
        echo "Sua conta foi criada com sucesso.";
    } else {
    }
    unset($_SESSION['perfil_criado']);

    //Email para recuperar senha não existe no sistema
    if (isset($_SESSION['email_nao_existe'])) {
        echo "O e-mail informado não existe em nosso registros.";
    } else {
    }
    unset($_SESSION['email_nao_existe']);

    //Email de recuperacao de senha enviado
    if (isset($_SESSION['email_enviado'])) {
        echo "Foi enviado um email com um link para a recuperação da senha.";
    } else {
    }
    unset($_SESSION['email_enviado']);

    //Email de recuperacao de senha enviado
    if (isset($_SESSION['token_nao_existe'])) {
        echo "O respectivo token para a recuperação de senha não existe. Inicie um novo processo para nova senha.";
    } else {
    }
    unset($_SESSION['token_nao_existe']);

    //Se a nova senha for vazio redireciona
    if (isset($_SESSION['senha_nao_pode_vazio'])) {
        echo "A nova senha não pode ser vazia, refaça o processo novamente.";
    } else {
    }
    unset($_SESSION['senha_nao_pode_vazio']);

    //Se a nova senha for vazio redireciona
    if (isset($_SESSION['senha_alterada_sucesso'])) {
        echo "A sua senha foi alterada com sucesso. Faça o login.";
    } else {
    }
    unset($_SESSION['senha_alterada_sucesso']);

    //ID do usuario é invalido
    if (isset($_SESSION['usuario_invalido'])) {
        echo "O ID do usuário é inválido.";
    } else {
    }
    unset($_SESSION['usuario_invalido']);

    //Se existe um usuario ou email no sistema nao atualiza
    if (isset($_SESSION['ja_existe_um_usuario_atualiza'])) {
        echo "O usuário/email que voce selecionou já existe no sistema, escolha outro.";
    } else {
    }
    unset($_SESSION['ja_existe_um_usuario_atualiza']);

    //Usuario atualizado com sucesso
    if (isset($_SESSION['usuario_atualizado_sucesso'])) {
        echo "Foi atualizado com sucesso.";
    } else {
    }
    unset($_SESSION['usuario_atualizado_sucesso']);

    //Usuario atualizado com sucesso
    if (isset($_SESSION['extensao_imagem_invalida'])) {
        echo "O upload da imagem não foi feito utilize uma imagem válida.";
    } else {
    }
    unset($_SESSION['extensao_imagem_invalida']);

    //Logout feito com sucesso
    if (isset($_SESSION['logout_sucesso'])) {
        echo "Você saiu com sucesso!";
    } else {
    }
    unset($_SESSION['logout_sucesso']);

    //Validacao dados vazio
    if (isset($_SESSION['dados_vazios'])) {
        echo "Usuario/Email ou senha vazios. Refaça o processo.";
    } else {
    }
    unset($_SESSION['dados_vazios']);

    //Usuario deletado
    if (isset($_SESSION['deletado_com_sucesso'])) {
        echo "Foi deletado com sucesso.";
    } else {
    }
    unset($_SESSION['deletado_com_sucesso']);

    //Validacao titulo do projeto vazio
    if (isset($_SESSION['titulo_vazio'])) {
        echo "O titulo do projeto está vazio.";
    } else {
    }
    unset($_SESSION['titulo_vazio']);

    //Projeto criado com sucesso
    if (isset($_SESSION['projeto_criado_com_sucesso'])) {
        echo "O Projeto foi criado com sucesso.";
    } else {
    }
    unset($_SESSION['projeto_criado_com_sucesso']);

    //Usuario vinculado com sucesso
    if (isset($_SESSION['usuario_vinculado_com_sucesso'])) {
        echo "O usuário foi vinculado com sucesso.";
    } else {
    }
    unset($_SESSION['usuario_vinculado_com_sucesso']);

    //Conta do usuario desativada
    if (isset($_SESSION['conta_desativada'])) {
        echo "A sua conta esta desativada, por favor contacte o administrador.";
    } else {
    }
    unset($_SESSION['conta_desativada']);
?>