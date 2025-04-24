<?php

use app\models\Proyectos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ProyectosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Proyectos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Proyectos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idproyectos',
            'nombre',
            'descripcion:ntext',
            'fecha_inicio',
            'fecha_fin',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Proyectos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idproyectos' => $model->idproyectos]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
