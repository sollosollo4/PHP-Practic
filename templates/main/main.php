<?php include '../templates/header.php' ?>

        <tr>
            <td>
                <?php foreach ($articles as $article){ ?>
                    <div class="row">
                        <h2><a class="link" href="articles/<?= $article->getId(); ?>"><?php echo $article->getName(); ?></a></h2>
                        <p><?php  echo $article->getText(); ?></p>
                    </div>
                <?php }?>
            </td>
            
<?php include '../templates/footer.php' ?>