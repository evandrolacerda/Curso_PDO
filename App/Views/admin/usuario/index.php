<div class="page-header">
    <h1>Usuários</h1>
</div>

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
    foreach ( $this->registros as $usuario ) {
        ?>
        <tr>
            <td>
                <?php echo htmlentities($usuario->id, ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?php echo htmlentities($usuario->nome, ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?php echo htmlentities($usuario->username, ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <a href="/editarUsuario?id=<?php echo $usuario->id ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </td>
            <td>
                <a href="/excluirUsuario?id=<?php echo $usuario->id ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
            <td>
                <a href="/showUsuario?id=<?php echo $usuario->id ?>">
                    <span class="glyphicon glyphicon-info-sign"></span>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>        