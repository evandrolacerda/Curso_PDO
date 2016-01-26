<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Nota</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    foreach ( $this->registros as $aluno ) {
        ?>
        <tr>
            <td>
                <?php echo htmlentities($aluno->id, ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?php echo htmlentities($aluno->nome, ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?php echo htmlentities($aluno->nota, ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <a href="/editar?id=<?php echo $aluno->id ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </td>
            <td>
                <a href="/excluir?id=<?php echo $aluno->id ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
            <td>
                <a href="exibir?id=<?php echo $aluno->id ?>">
                    <span class="glyphicon glyphicon-info-sign"></span>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>        