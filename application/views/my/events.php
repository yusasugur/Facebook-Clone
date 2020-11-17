<div class="container">
  <div class="jumbotron jumbotron-fluid center">
    <div class="container">
      <h1 class="display-4">My Events</h1>
    </div>

    <div class="container">
      <?php echo validation_errors(); ?>
      <?php echo form_open_multipart('my/events'); ?>
      <form>
        <div class="form-group">
          <label for="inputAddress">Event Name</label>
          <input type="text" name="name" class="form-control bg-dark text-white" style="width: 150px;">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Event Description</label>
          <textarea name="desc" class="form-control bg-dark text-white" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Create Event</button>
      </form>
      <div class="container">
        <div class="row ">
          <div class="col-2 ">Event Name</div>
          <div class="col-1 "></div>

          <div class="col-2 ">Event Description</div>
        </div>
      </div>

      <?php foreach ($events as $event) : ?>
        <div class="container">
          <div class="row border border-dark bg-dark rounded" id="marg">
            <div class="col-3"><?php echo $event['event_name'] ?></div>
            <div class="col-6"><?php echo $event['event_descr'] ?> </div>
            <div class="col-3"> Posted on: <?php echo $event['created_at'] ?> </div>
          </div>
        </div>
      <?php endforeach; ?>


    </div>

  </div>

</div>