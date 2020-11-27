<?php
$this->title = "Rooms";
$this->registerCssFile('@web/css/custom.css');
?>
<div class="row">
    <?php
    $colors = ["green", "red", "yellow"];
    $status = ["ว่าง", "กำลังซ่อม", "ไม่ว่าง"];
    ?>
    <?php for ($i = 0; $i <= 200; $i++) { ?>
            <?php $idx = rand(0,2); ?>
            <div class="col-md-3 col-sm-6 col-xs-12 cursor-pointer hover-grey">
                <div class="info-box">
                    <span class="info-box-icon bg-<?= $colors[$idx]; ?>"><i class="fa fa-bed fa-lg"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">ห้อง 30<?= $i; ?></span>
                        <span class="info-box-number">สถานะ <?= $status[$idx]; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
    <?php } ?>
</div>
