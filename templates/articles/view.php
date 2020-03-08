<?php include '../templates/header.php' ?>

        <tr>
            <td>
                <div class="row">
                    <h2><?php echo $article->getName(); ?></h2>
                    <p><?php  echo $article->getText(); ?></p>
                    <p>Автор: <em><?php  echo $article->getAuthor()->getUsername(); ?></em></p>
                </div>
            </td>
            
<?php include '../templates/footer.php' ?>