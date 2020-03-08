<?php include __DIR__ . '/../header.php'; ?>
    <?php foreach ($articles as $article){ ?>
        <div class="row">
            <h2>
                <a class="link" href="articles/<?= $article->getId(); ?>"><?php echo $article->getName(); ?></a> 
                <?php
                    if($user !== null){
                        if($user->getNickname() == 'admin'){
                            ?><span style="font-size: 12px;">
                                <a href="/PHP-Practic/www/articles/<?= $article->getId(); ?>/edit">Редактировать</a>
                            </span><?php
                        }
                    }
                ?>
            </h2>
            <p><?php  echo $article->getText(); ?></p>
        </div>
    <?php }?>
<?php include __DIR__ . '/../footer.php'; ?>