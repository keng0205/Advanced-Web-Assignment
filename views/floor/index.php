<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FloorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Floors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Floor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'floorId',
            'floorNumber',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
