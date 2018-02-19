<?php require_once 'header.php' ?>
<?php require_once 'nav.php' ?>

<div id="content"  class="container" >
  <h2>Create A Pin on Map</h2>
  <h4 class="text-danger">DO NOT add %, input NUMBER only</h4>
  <div id="alert" class="alert alert-success collapse" role="alert">
    <button type="button" class="close close-alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <span id="message"></span>
  </div>

  <form id="new-pin">
    <div class="form-group">
      <label for="country">Select a country</label>
      <select class="form-control" id="select-country-add" name="country-id">
      <?php foreach ($countries as $country): ?>
        <option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
      <?php endforeach; ?>
      </select>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <label for="subhead">Top</label>
        <input type="number" step="0.01" class="form-control" id="top-position" name="top-position" required />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <label for="date">Left</label>
        <input type="number" step="0.01" class="form-control" id="left-position" name="left-position" required />
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">create</button>
    </div>
  </form>
</div>

<?php require_once 'footer.php' ?>