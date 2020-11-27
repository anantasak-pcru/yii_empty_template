<?php
/** @var $model User */

use common\models\User;
use frontend\models\Orders;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use \kartik\form\ActiveForm;


$model = new User();
$order = new Orders();
?>
<div class="col-row">
    <div class="col-md-6 col-xs-6 col-lg-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>


            <form role="form" method="post">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <?php echo '<h3 class="control-label">วันเวลาออกเดินทาง</h3>'; ?>
                            <?= DatePicker::widget([
                                'name' => 'dp_2',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                'value' => '23-Feb-1982',
                                "removeButton" => false,
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <?php echo '<h3 class="control-label">วันเวลาออกเดินทาง</h3>'; ?>
                            <?= DatePicker::widget([
                                'name' => 'dp_2',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                'value' => '23-Feb-1982',
                                "removeButton" => false,
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12 col-lg-12 p-5">
                            <label class="control-label"></label>
                            <?= DatePicker::widget([
//                                'model' => $model,
//                                'attribute' => 'from_date',
//                                'attribute2' => 'to_date',
//                                'options' => ['placeholder' => 'Start date'],
//                                'options2' => ['placeholder' => 'End date'],
                                'name' => 'dp_addon_3a',
                                'value' => '01-Jul-2015',
                                'name2' => 'dp_addon_3b',
                                'value2' => '18-Jul-2015',
                                'type' => DatePicker::TYPE_RANGE,
//                                'form' => $form,
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'autoclose' => true,
                                ]
                            ]); ?>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right w-auto">Submit</button>
                </div>
            </form>


        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-lg-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <form role="form" method="post" action="<?= Url::to(["locations/fromsubmit"])?>">
                <?php $form = ActiveForm::begin(); ?>
                <?= Html::hiddenInput('input-type-1', 'Additional value 1', ['id' => 'input-type-1']); ?>
                <?= Html::hiddenInput('input-type-2', 'Additional value 2', ['id' => 'input-type-2']); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map($data, "id", "username"), ['prompt' => 'เลือกภาค']); ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($order, 'orderNumber')->widget(DepDrop::class, [
                            'options' => ['id' => 'id'],
                            'pluginOptions' => [
                                "placeholder" => "Please Select...",
                                'depends' => [Html::getInputId($model, 'id')],
                                'url' => Url::to(['/locations/depend'])
                            ]
                        ]); ?>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?php ActiveForm::end(); ?>
            </form>
        </div>
    </div>
</div>
