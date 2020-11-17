<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('my/profile'); ?>

    <form>

      <div class="form-row">
        <div class="form-group">
          <input type="file" name="profilephoto" class="form-control-file">
        </div>
      </div>

      <div class="form-row">

        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input name="email" value="<?php echo $infos->email; ?>" type="email" class="form-control" id="inputEmail4">
          <?php echo form_error('email'); ?>

        </div>

        <div class="form-group col-md-6">
          <label for="inputPassword4">Password</label>
          <input name="password" value="" type="password" class="form-control" id="inputPassword4">
          <?php echo form_error('password'); ?>

        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">

          <label for="firstName">First Name</label>
          <input name="firstname" value="<?php echo $infos->first_name; ?>" type="text" class="form-control" placeholder="First name">
          <?php echo form_error('firstname'); ?>

        </div>
        <div class="form-group col-md-6">

          <label for="lastName">Last Name</label>
          <input name="lastname" value="<?php echo $infos->last_name; ?>" type="text" class="form-control" placeholder="Last name">
          <?php echo form_error('lastname'); ?>

        </div>
      </div>
      <button type="submit" class="btn btn-dark">Save Changes</button>

    </form>
    <?php echo form_close(); ?>

  </div>
</div>