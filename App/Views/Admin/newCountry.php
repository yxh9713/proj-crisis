<?php require_once 'header.php' ?>
<?php require_once 'nav.php' ?>

<div id="content">
    <h2>Create A New Country</h2>
    <div id="alert" class="alert alert-success collapse" role="alert">
      <button type="button" class="close close-alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="message"></span>
    </div>
    
    <form id="new-country">
      <div class="form-group">
        <label for="countryName">Country Name</label>
        <input type="text" class="form-control" id="country-name" name="country-name" required />
      </div>
      <button type="submit" class="btn btn-primary">create</button>
    </form>
</div>

<?php require_once 'footer.php' ?>