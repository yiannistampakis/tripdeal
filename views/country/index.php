<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Country'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            [
                'attribute' => 'code',
                'label' => 'Κωδικός Χώρας',
                'headerOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'name',
                'label' => 'Όνομα Χώρας',
                'headerOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'phonecode',
                'label' => 'Τηλεφωνικός Κωδικός',
                'headerOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'lat',
                'label' => 'Γεωγραφικό πλάτος',
                'headerOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'lng',
                'label' => 'Γεωγραφικό μήκος',
                'headerOptions' => ['style' => 'text-align:center']
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ενέργειες',
                'headerOptions' => ['style' => 'text-align:center']
            ],
        ],
        ]); ?>


</div>
