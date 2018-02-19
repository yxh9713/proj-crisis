<?php require_once 'header.php' ?>
<?php require_once 'nav.php' ?>

<div id="content">
    <h2>Edit Pins</h2>
    <div id="alert" class="alert alert-success collapse" role="alert">
      <button type="button" class="close close-alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="message"></span>
    </div>

    <?php foreach ($pins as $pin): ?>
    <div class="form-inline">
      <div class="form-group">
        <label for="email">Country: </label>
        <input type="text" class="form-control" value="<?php echo $pin['name']; ?>" readonly />
      </div>
      <div class="form-group">
        <label for="top">Top:</label>
        <input type="text" class="form-control" value="<?php echo $pin['top_position']; ?>%" readonly />
      </div>
      <div class="form-group">
        <label for="top">Left:</label>
        <input type="text" class="form-control" value="<?php echo $pin['left_position']; ?>%" readonly />
      </div>
      <div class="form-group">
        <button type="button" ref="<?php echo $pin['id']; ?>" class="btn btn-default delete-pin">Delete</button>
      </div>
    </div>
    <?php endforeach; ?>
      
</div>

<?php require_once 'footer.php' ?>