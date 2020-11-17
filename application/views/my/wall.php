<div class="container">
  <div class="jumbotron jumbotron-fluid center">
    <div class="container">
      <h1 class="display-4">My Wall</h1>
    </div>

    <div class="container">
      <?php echo validation_errors(); ?>
      <?php echo form_open_multipart('my/wall'); ?>
      <form>
        <div class="form-group text-center">
          <label class="text-monospace" for="exampleFormControlTextarea1"><kbd>Share your toughts</kbd></label>
          <textarea name="body" placeholder="I feel..." class="form-control bg-dark text-white" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
    </div>
    <?php foreach ($feeds as $feed) : ?>
      <div class="container">
        <div class="row border border-dark bg-dark rounded" id="marg">
          <div class="col-2"><img class="vertical-center circle" src="<?php echo site_url(); ?>assets/images/<?php echo $feed['img']; ?>" alt=""></div>
          <div class="col-7">
            <p class="vertical-center""><?php echo $feed['content'] ?></p> </div>
        <div class=" col-3">
              <p><?php echo $feed['fullname'] ?> </p>
              <p>Posted on: <?php echo $feed['created_at'] ?> </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>