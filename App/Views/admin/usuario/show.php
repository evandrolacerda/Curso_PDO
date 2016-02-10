<div class="panel panel-default">
    <div class="panel-heading">Cadastro de Usuário</div>
    <div class="panel-body">
        <div class="thumbnail col-sm-2">
            <img class="img-thumbnail img-circle" src="images/profile.jpg">
        </div>
        <div class="col-sm-10">
            <p class="form-control-static"><strong>ID do Usuário:</strong> <?php echo htmlentities($this->usuario->id, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="form-control-static"><strong>Nome:</strong> <?php echo htmlentities($this->usuario->nome, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="form-control-static"><strong>Username:</strong> <?php echo htmlentities($this->usuario->username, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="form-control-static"><strong>Administrador:</strong> <?php
                if ((int) $this->usuario->admin === 1) {
                    echo 'Sim';
                } else {
                    echo 'Não';
                }
                ?>    
            </p>
            <hr>
            <p>
            <div class="col-sm-3">
                <a href="/editar?id=<?php echo htmlentities($this->usuario->id, ENT_QUOTES, 'UTF-8'); ?>"
                   class="btn btn-primary btn-block"> <span class="glyphicon glyphicon-edit"></span> Editar</a>
            </div>
            <div class="col-sm-3">
                <a href="/senhaUsuario?id=<?php echo htmlentities($this->usuario->id, ENT_QUOTES, 'UTF-8'); ?>"
                   class="btn btn-success btn-block"> <span class="glyphicon glyphicon-trash"></span> Editar Senha</a>
            </div>
            <div class="col-sm-3">
                <a href="/excluir?id=<?php echo htmlentities($this->usuario->id, ENT_QUOTES, 'UTF-8'); ?>"
                   class="btn btn-danger btn-block"> <span class="glyphicon glyphicon-trash"></span> Excluir</a>
            </div>
            </p>
        </div>
    </div>
</div>