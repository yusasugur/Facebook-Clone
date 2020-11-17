<div class="row">

  <div class="col-3">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h4> <img class="circle" src="<?php echo site_url(); ?>assets/images/<?php echo $this->session->userdata('image');  ?>" alt=""> | <?php print_r(ucfirst($fullname[0]['first_name']) . " " . ucfirst($fullname[0]['last_name'])) ?></h4>
        <ul class="list-group list-group-flush">

          <li class="list-group-item">
            <a href="<?php echo base_url(); ?>my/profile" role="button" class="btn btn-dark">My Profile
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755S12 12 8 12s-5 1.755-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
              </svg>
            </a>
          </li>
          <li class="list-group-item">
            <a href="<?php echo base_url(); ?>my/wall" role="button" class="btn btn-dark">My Wall
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bricks" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h15a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H14v2h1.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H14v2h1.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5H2v-2H.5a.5.5 0 0 1-.5-.5v-3A.5.5 0 0 1 .5 6H2V4H.5a.5.5 0 0 1-.5-.5v-3zM3 4v2h4.5V4H3zm5.5 0v2H13V4H8.5zM3 10v2h4.5v-2H3zm5.5 0v2H13v-2H8.5zM1 1v2h3.5V1H1zm4.5 0v2H15V1H5.5zM1 7v2h3.5V7H1zm4.5 0v2h5V7h-5zm6 0v2H15V7h-3.5zM1 13v2h3.5v-2H1zm4.5 0v2h5v-2h-5zm6 0v2H15v-2h-3.5z" />
              </svg>
            </a>
          </li>

          <li class="list-group-item">
            <a href="<?php echo base_url(); ?>my/events" role="button" class="btn btn-dark">My Events
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z" />
              </svg>
            </a>
          </li>
        </ul>
        <hr>
        <h4> I Will Attend


        </h4>
        <ul class="list-group list-group-flush" id="atEvents">
          <?php foreach ($my_events as $my_event) : ?>
            <li class="list-group-item"><?php echo $my_event['event_name'] ?></li>
          <?php endforeach; ?>

        </ul>


        <a style="margin-top: 10px;" role="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong">Coming Events
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-event-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
          </svg>
        </a>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Coming Events</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php foreach ($all_events as $all_event) : ?>
                  <li class="list-group-item">
                    <div class="row" id="row<?php echo $all_event['event_id'] ?>">
                      <div class="col-3">
                        <?php echo $all_event['event_name'] ?>

                      </div>
                      <div class="col-4">
                        <?php echo $all_event['event_descr'] ?>
                      </div>
                      <div class="col-3">
                        <svg id="btn" class="<?= $all_event['event_name'] ?>" href="<?php echo $all_event['event_id'] ?>" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                          <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                      </div>
                    </div>
                  </li>
                <?php endforeach; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="col-7">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Feeds</h1>
        <p class="lead">This is a place where you can share your thoughts and see your feed.</p>

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('feeds/'); ?>
        <form>
          <div class="form-group text-center">
            <label class="text-monospace" for="exampleFormControlTextarea1"><kbd>Share your toughts</kbd></label>
            <textarea name="body" placeholder="I feel..." class="form-control bg-dark text-white" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-dark">Submit</button>
        </form>
      </div>

      <div class="container">
        <?php foreach ($feeds as $feed) : ?>
          <div class="row border border-dark rounded bg-dark" id="marg">
            <div class="col-2"><img class="vertical-center circle" src="<?php echo site_url(); ?>assets/images/<?php echo $feed['img']; ?>" alt=""></div>
            <div class="col-7 ">
              <p class="vertical-center"><?php echo $feed['content'] ?></p>
            </div>
            <div class="col-3">
              <p><?php echo $feed['fullname'] ?> </p>
              <p>Posted on: <?php echo $feed['created_at'] ?> </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>



    </div>
  </div>

  <div class="col-2">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
          </svg>Friends</h1>
        <ul id="frnds" class="list-group list-group-flush">
          <?php foreach ($friends as $friend) : ?>
            <li class="list-group-item"><img class="circle" src="<?php echo site_url(); ?>assets/images/<?php echo $friend['user_image'];  ?>" alt=""> | <?php echo ucfirst($friend['first_name']) . " " . ucfirst($friend['last_name']); ?></li>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>
  </div>

</div>

<script>
  $(function() {
    $("#btn").click(function(event) {
      event.preventDefault();
      let id = $(this).attr("href");
      let name = $(this).attr("class")
      console.log(id);

      $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>my/add_event",
        data: {
          id: id
        },
        success: function(response) {
          console.log(response);
          $("#row" + id).remove();
          $("<li class='list-group-item' >" + name + "</li>").appendTo("#atEvents");
        },
        error: function() {
          alert("Invalide!");
        }
      });

    });



  });
</script>