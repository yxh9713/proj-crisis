<?php require_once 'header.php' ?>
<?php require_once 'nav.php' ?>

<div id="content">
  <h2>Edit Discussion</h2>
  <div id="alert" class="alert alert-success collapse" role="alert">
    <button type="button" class="close close-alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <span id="message"></span>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($comments as $comment): ?>
      <tr id="comment-<?php echo $comment['id']; ?>">
        <td class="col-md-2"><?php echo htmlspecialchars($comment['name']); ?></td>
        <td class="col-md-2"><?php echo htmlspecialchars($comment['email']); ?></td>
        <td class="col-md-6"><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></td>
        <td class="col-md-2">
          <button type="button" ref="<?php echo $comment['id']; ?>" class="btn btn-sm btn-default btn-approve-comment">Approve</button>
          <button type="button" ref="<?php echo $comment['id']; ?>" class="btn btn-sm btn-danger btn-delete-comment">Delete</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<?php require_once 'footer.php' ?>