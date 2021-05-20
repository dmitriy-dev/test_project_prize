<div class="container">
    <div class="col-md-8 offset-md-2 col-10 offset-1">
        <form method="POST" action="<?php echo url('login') ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="mt-2">
            <?php if (hasFlash('errors')) {
                foreach (getFlash('errors') as $error) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                }
            } ?>
        </div>

    </div>
</div>
