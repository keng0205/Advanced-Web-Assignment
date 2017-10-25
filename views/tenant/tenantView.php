<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tenant */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tenants', 'url' => ['/tenant/display']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'lotNumber',
            ['label' => 'Floor','value' =>$model->floor->floorNumber],
            ['label' => 'Zone','value' =>$model->zone->zoneName],
            ['label' => 'Category','value' =>$model->category->categoryName],
        ],
    ]) ?>

</div>
