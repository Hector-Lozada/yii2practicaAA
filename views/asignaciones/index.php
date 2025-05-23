<?php

use app\models\Asignaciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Tareas;
use app\models\Empleados;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\AsignacionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Asignaciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Asignaciones'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idasignaciones',
            [
                'attribute' => 'tarea_id',
                'label' => 'Tarea',
                'value' => function($model) {
                    return $model->tarea->titulo ?? 'Sin tarea';
                },
                'filter' => ArrayHelper::map(Tareas::find()->all(), 'idtareas', 'titulo'),
            ],
            [
                'attribute' => 'empleado_id',
                'label' => 'Empleado',
                'value' => function($model) {
                    return $model->empleado->nombre ?? 'Sin asignar';
                },
                'filter' => ArrayHelper::map(Empleados::find()->all(), 'idempleados', 'nombre'),
            ],
            [
                'attribute' => 'fecha_asignacion',
                'format' => ['date', 'php:Y-m-d'],
                'filter' => Html::activeTextInput($searchModel, 'fecha_asignacion', [
                    'class' => 'form-control'
                ]),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Asignaciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idasignaciones' => $model->idasignaciones]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>