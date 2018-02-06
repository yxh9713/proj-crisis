<?php require_once 'header.php' ?>
<?php require_once 'nav.php' ?>

<div id="content">
    <h2>Create A New Event</h2>
    <div id="alert" class="alert alert-success collapse" role="alert">
      <button type="button" class="close close-alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="message"></span>
    </div>

    <form id="new-event">
      <div class="form-group">
        <label for="country">Select a country</label>
        <select class="form-control" id="select-country-add" name="country">
        <?php foreach ($countries as $country): ?>
          <option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
        <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="countryName">Subhead</label>
        <input type="text" class="form-control" id="subhead" name="subhead" />
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input type="text" class="form-control date" id="date" name="date">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">create</button>
    </form>
    <div id="alert" class="hide alert alert-success"></div>
</div>

<?php require_once 'footer.php' ?>