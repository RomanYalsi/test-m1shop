<?php require VIEWS_PATH . 'parts/header.html' ?>
<?php require VIEWS_PATH . 'parts/message.php' ?>

<?php if (empty($this->post)): ?>
    <p class="error">Post Data Not Found!</p>
<?php else: ?>

    <form action="" method="post">
        <p><label for="title">Title:</label><br />
            <input type="text" name="title" id="title" value="<?=htmlspecialchars($this->post->title)?>" required="required" />
        </p>

        <p><label for="body">Body:</label><br />
            <textarea name="body" id="body" rows="5" cols="35" required="required"><?=htmlspecialchars($this->post->body)?></textarea>
        </p>

        <p><input type="submit" name="edit_submit" value="Update" /></p>
    </form>
<?php endif ?>

<?php require VIEWS_PATH . 'parts/footer.html' ?>
