<?php require 'parts/header.html' ?>

<?php if (empty($this->posts)): ?>
    <p class="bold">There is no Blog Post.</p>
    <p><button type="button" onclick="window.location='<?=URL?>?p=blog&amp;a=add'" class="bold">Add Your First Blog Post!</button></p>
<?php else: ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <?php foreach ($this->posts as $post): ?>
    <!-- Main Content -->
          <div class="post-preview">
            <a href="<?=URL?>?p=blog&amp;a=post&amp;id=<?=$post->id?>">
              <h2 class="post-title">
                  <?=htmlspecialchars($post->title)?>
              </h2>
            </a>
            <img src=<?='/assets/img/posts/'. $post->image?> />
            <h3 class="post-subtitle">
              <div class="message-box" id="message_<?=$post->id?>">
              <p class="message-content"><?=nl2br(htmlspecialchars(mb_strimwidth($post->body, 0, 100, '...')))?></p>
              </div>
            </h3>
            <p class="post-meta">Posted by <?=$post->createdDate?></p>
          </div>
          <hr>
        <?php require 'parts/buttons.php' ?>
        <hr class="clear" /><br />
    <?php endforeach ?>
    </div>
  </div>
</div>
<?php endif ?>

<?php require 'parts/footer.html' ?>
