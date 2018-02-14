<?php require_once 'header.php' ?>
<?php require_once 'nav.php' ?>

<div id="content">
    <h2>Edit Event</h2>
    <div id="alert" class="alert alert-success collapse" role="alert">
      <button type="button" class="close close-alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="message"></span>
    </div>

    <div class="form-group">
      <label for="country">Select a country</label>
      <select class="form-control" id="country" name="country">
      <?php foreach ($countries as $country): ?>
      <?php var_dump($countryId,$country['id']); ?>
        <option value="<?php echo $country['id'] ?>" <?php if($countryId==$country['id']) echo 'selected'; ?>><?php echo $country['name'] ?></option>
      <?php endforeach; ?>
      </select>
    </div>

    <?php foreach ($events as $event): ?>
    
    <div class="row row-bordered" ref="<?php echo $event['id']; ?>">
      <div class="col-md-6">
        <label for="subhead">Subhead</label>
        <input type="text" class="form-control" id="subhead" name="subhead" value="<?php echo $event['subhead']; ?>" />
      </div>
      <div class="col-md-6">
        <label for="date">Date</label>
        <input type="text" class="form-control date" id="date<?php echo $event['id']; ?>" name="date<?php echo $event['id']; ?>" value="<?php echo $event['date']; ?>" />
      </div>
      <div class="col-md-12 mt-1">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?php echo $event['description']; ?></textarea>
      </div>
      <div class="btn-group col-md-6 mt-1" role="group">
        <button type="button" class="btn btn-default btn-save-event">Save</button>
        <button type="button" class="btn btn-danger btn-delete-event">Delete</button>
      </div>
    </div>

    <?php endforeach; ?>
      
</div>

<?php require_once 'footer.php' ?>