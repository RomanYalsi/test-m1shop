<?php require VIEWS_PATH . 'parts/header.html' ?>
<?php require VIEWS_PATH . 'parts/message.php' ?>

<form action="" enctype="multipart/form-data" method="post">

    <p><label for="title">Title:</label><br />
        <input type="text" name="title" id="title" required="required" />
    </p>

    <p><label for="image">Image:</label><br />
      <input type="file" name="image" id="image" required="required" />
    </p>

    <p><label for="body">Body:</label><br />
        <textarea name="body" id="body" rows="5" cols="35" required="required"></textarea>
    </p>

    <p><input type="submit" name="add_submit" value="Add" /></p>
</form>

<?php require  VIEWS_PATH . 'parts/footer.html' ?>
