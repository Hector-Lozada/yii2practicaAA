<?php

use app\models\Comentarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Tareas;
use app\models\Empleados;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\ComentariosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Comentarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Comentarios'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcomentarios',
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
            'comentario:ntext',
            [
                'attribute' => 'fecha',
                'format' => ['date', 'php:Y-m-d'],
                'filter' => Html::activeTextInput($searchModel, 'fecha', [
                    'class' => 'form-control',
                ]),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Comentarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idcomentarios' => $model->idcomentarios]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>