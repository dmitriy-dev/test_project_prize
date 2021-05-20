<?php
/**
 * @var \Core\Entities\Prize $receivedPrize
 */
?>
<h2>Добро пожаловать <?php echo \Core\App\Auth::gi()->user()->name ?? null ?></h2>
<?php if (\Core\App\Auth::gi()->user() !== null) { ?>
    <div class="container">
        <div class="col-md-6">
            <form method="POST" action="<?php echo url('prize') ?>">
                <input type="submit" class="btn btn-primary" value="Получить случайный приз">
            </form>
        </div>
        <div class="col-md-6">
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
            <div class="mt-2">
                <?php if (hasFlash('success')) {
                    foreach (getFlash('success') as $success) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success ?>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>
<?php } ?>
