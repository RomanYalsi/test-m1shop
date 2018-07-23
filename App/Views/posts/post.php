<?php require 'parts/header.php' ?>

<?php if (empty($this->post)): ?>
    <p class="error">The post can't be be found!</p>
<?php else: ?>

    <article>
        <time datetime="<?=$this->post->createdDate?>" pubdate="pubdate"></time>

        <h1><?=htmlspecialchars($this->post->title)?></h1>
        <p><?=nl2br(htmlspecialchars($this->post->body))?></p>
        <p class="left small italic">Posted on <?=$this->post->createdDate?></p>

        <?php
        $post = $this->post;
        require 'parts/buttons.php';
        ?>
    </article>

<?php endif ?>

<?php require 'parts/footer.php' ?>
