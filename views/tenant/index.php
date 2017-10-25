<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TenantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tenants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tenant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'lotNumber',
             [   
                'value' =>function($model) {
                    return $model->floor->floorNumber;},
                'attribute' => 'floorId',
                'label' => 'Floor'],
             [   
                'value' =>function($model) {
                    return $model->zone->zoneName;},
                'attribute' => 'zoneId',
                'label' => 'Zone'],

            [   
                'value' =>function($model) {
                    return $model->category->categoryName;},
                'attribute' => 'categoryId',
                'label' => 'Category'],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
