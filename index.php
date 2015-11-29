<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nota</th>
            </tr>
            <?php
            try {
                $connection = new \PDO('mysql:host=localhost;dbname=curso_pdo;charset=utf8', 'root', '');

                $query = "SELECT * FROM alunos";

                $stmt = $connection->query($query);
                $stmt->execute();

                while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><?php echo htmlentities($row->id, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlentities($row->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlentities($row->nota, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
            ?>            
        </table>

        <h1>As três melhores notas</h1>
        <hr />

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nota</th>
            </tr>
            <?php
            //Seleciona apenas as três melhores notas

            $stmt = $connection->query($query . " ORDER BY nota DESC LIMIT 3 ");

            $stmt->execute();

            while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
                ?>
                <tr>
                    <td><?php echo htmlentities($row->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlentities($row->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlentities($row->nota, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
</html>
