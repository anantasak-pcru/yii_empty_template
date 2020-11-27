<?php

use frontend\themes\adminlte3\CustomActionColumn;
use kartik\dialog\Dialog;
use edofre\fullcalendar\models\Event;
use frontend\models\Productlines;
use frontend\models\Products;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\bootstrap4\LinkPager;
use yii\bootstrap4\Modal;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = "Calendar";

$form = ActiveForm::begin();
$productLineModel = new Productlines();
$productModel = new Products();
\yii\widgets\Pjax::begin();
$a = GridView::widget([
    "tableOptions" => [
        "class" => ["table table-bordered table-hover dataTable"],
    ],
    "showHeader" => true,
    "showFooter" => false,
    'layout' => "{summary}\n{items}\n<div class='pull-right' style='float: right'>{pager}</div>",
    'pager' => [
        'class' => LinkPager::class
    ],
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'orderNumber',
        'orderDate',
        'requiredDate',
        'shippedDate',
        'status',
        'productCode',
        ['class' => CustomActionColumn::class],
    ],
]);
\yii\widgets\Pjax::end();
//$html = <<< HTML
//HTML;

$html = $a;

$js = <<< JS
$('#btn-1').on('click', function() { 
    BootstrapDialog.show({
        size: BootstrapDialog.SIZE_WIDE,
        closable: false, 
        title: "Myform",
        message: `$html`,
        buttons: [{
                label: '<i class="fa fas-pen"></i>Button 2',
                cssClass: 'btn-danger',
                action: function(dialog){
                    alert($("#input1").val())
                    dialog.close()
                }
            }]
    });
});
JS;


$this->registerJs($js);

?>
<?php Modal::begin([
    'title' => 'Hello world',
    "headerOptions" => [
        "class" => ["modal-danger"]
//    "style" => ["background" => "red"]
    ],
    'toggleButton' => ['label' => 'click me', "class" => ["btn", "btn-primary"]],
    "size" => Modal::SIZE_EXTRA_LARGE,
    'closeButton' => ["Close" => true],
    "scrollable" => true,
]);

echo $a;
echo $a;
echo $a;
Modal::end(); ?>
    <button class="btn btn-success" id="btn-1">Clicked</button>
    <div class="row">
        <div class="col - md - 6 col - sm - 6 col - xs - 12 ">
            <?= $form->field($productLineModel, 'productLine')->widget(Select2::class, [
                "data" => ArrayHelper::map(Productlines::find()->select(["productLine"])->all(), "productLine", "productLine"),
                'pluginOptions' => [
                    'placeholder' => 'Product Line ...',
                ]
            ]); ?>
        </div>
        <div class="col - md - 6 col - sm - 6 col - xs - 12 ">
            <?= $form->field($productModel, 'productCode')->widget(DepDrop::class, [
                'options' => ['id' => 'productCode'],
                'pluginOptions' => [
                    "depends" => [Html::getInputId($productLineModel, "productLine")],
                    'placeholder' => 'Select Product ...',
                    'url' => Url::to(['/rooms/productlist'])
                ]
            ]); ?>
        </div>
    </div>


<?php
$events = [
    new Event([
        'title' => 'Room 301',
        'start' => '2020-11-12',
        'end' => '2020-11-30',
        "backgroundColor" => "green"
    ]),
    new Event([
        'title' => 'Room 301',
        'start' => '2020-11-12',
        'end' => '2020-11-30',
        "backgroundColor" => "red"
    ]),
    new Event([
        'title' => 'Room 301',
        'start' => '2020-11-12',
        'end' => '2020-11-30',
        "backgroundColor" => "blue"
    ]),
    new Event([
        'title' => 'Room 301',
        'start' => '2020-11-12',
        'end' => '2020-11-30',
        "backgroundColor" => "green"
    ]),
    new Event([
        'title' => 'Room 301',
        'start' => '2020-11-12',
        'end' => '2020-11-30',
        "backgroundColor" => "red"
    ]),
    new Event([
        'title' => 'Room 301',
        'start' => '2020-11-12',
        'end' => '2020-11-30',
        "backgroundColor" => "blue"
    ]),
];
?>

<?= edofre\fullcalendar\Fullcalendar::widget([
    'events' => $events,
    'theme' => true
]);
?>