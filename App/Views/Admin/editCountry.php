<?php require_once 'header.php' ?>
<?php require_once 'nav.php' ?>

<div id="content">
  <h2>Edit Country</h2>
  
  <ul class="nav nav-pills">
    <?php foreach ($categories as $category): ?>
      <li class="<?php if($categoryId === $category['category']) echo 'active'; ?>">
        <a href="/admin/countries/<?php echo $category['category']; ?>/edit">
          <?php echo $category['category']; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <div id="alert" class="alert alert-success collapse" role="alert">
    <button type="button" class="close close-alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <span id="message"></span>
  </div>

  <?php foreach ($countries as $country): ?>
  <div class="form-group input-group">
    <input 
      type="text" 
      class="form-control" 
      ref="<?php echo $country['id']; ?>" 
      name="country-name" 
      value="<?php echo $country['name']; ?>" 
    />
    <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-save">Save</button>
      <button type="button" class="btn btn-danger btn-delete">Delete</button>
    </span>
  </div>

  <?php endforeach; ?>

</div>

<?php require_once 'footer.php' ?>