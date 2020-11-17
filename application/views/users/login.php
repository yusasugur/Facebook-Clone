<html>
<style type="text/css">
    .photo {
        background-image: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.idownloadblog.com%2Fwp-content%2Fuploads%2F2019%2F08%2FFAcebook-DarK-Mode-hero-001.png&f=1&nofb=1);
        background-size: cover;
        border-radius: 5%;

    }
</style>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <?php echo form_open('users/login'); ?>

        <div class="row">
            <div class="photo col-md-5 ml-md-auto">
            </div>
            <div class="col-md-5 ml-md-auto">

                <h1>Please Login</h1>
                <form>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <?php echo form_error('email'); ?>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <?php echo form_error('password'); ?>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>


                    <button type="submit" name="button" class="btn btn-outline-dark ">Login</button>

                    <a href="<?php echo base_url(); ?>users/register" role="button" class="btn btn-outline-dark">I don't have an account</a>

                </form>

            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>


</html>