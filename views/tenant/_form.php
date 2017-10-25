<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Floor;
use app\models\Zone;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Tenant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lotNumber')->textInput() ?>

    <?= $form->field($model, 'floorId')->dropDownList(
        ArrayHelper::map(Floor::find()->all(), 'floorId', 'floorNumber'))->label('Floor') ?>

    <?= $form->field($model, 'zoneId')->dropDownList(
        ArrayHelper::map(Zone::find()->all(), 'zoneId', 'zoneName'))->label('Zone') ?>

    <?= $form->field($model, 'categoryId')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'categoryId', 'categoryName'))->label('Category') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
