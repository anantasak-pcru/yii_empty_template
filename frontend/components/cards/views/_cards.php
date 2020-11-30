<?php
/**
 * @var string $header
 * @var mixed $body
 * @var mixed $footer
 * @var string $theme
 */

use yii\helpers\Html;

?>

<div class="card <?= $theme ?>">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($header) ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        <div class="card-body">
            <?= $body ?>
        </div>
        <?php if ($footer != null) { ?>
        <div class="card-footer">
            <?= $footer ?>
        </div>
        <?php } ?>
    </form>
</div>
