<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
<?php
foreach ($model as $key) 
{
echo $model->name;

}


 ?>

    <code><?= __FILE__ ?></code>
</div>
