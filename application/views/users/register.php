<html>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <H1>Register</H1>
        <?php echo form_open('users/register'); ?>

        <form>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <?php echo form_error('email'); ?>

                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                    <?php echo form_error('password'); ?>

                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="inputName">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="inputLastName">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Profile Photo</label>
                <input type="file" class="form-control-file" name="profilephoto" id="exampleFormControlFile1">
            </div>

            <button type="submit" class="btn btn-dark">Register</button>

        </form>
        <?php echo form_close(); ?>

    </div>
</div>

</html>