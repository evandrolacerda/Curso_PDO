<div class="panel panel-default">
    <div class="panel-heading">Cadastro de Aluno</div>
    <div class="panel-body">
        <div class="thumbnail col-sm-2">
            <img class="img-thumbnail img-circle" src="images/profile.jpg">
        </div>
        <div class="col-sm-10">
            <p class="form-control-static"><strong>ID do Aluno:</strong> <?php echo htmlentities($this->aluno->id, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="form-control-static"><strong>Nome do Aluno:</strong> <?php echo htmlentities($this->aluno->nome, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="form-control-static"><strong>Nota:</strong> <?php echo htmlentities($this->aluno->nota, ENT_QUOTES, 'UTF-8'); ?></p>
            <hr>
        </div>
    </div>
</div>