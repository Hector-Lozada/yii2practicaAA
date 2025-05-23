<?php

use app\models\Tareas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use app\models\Proyectos;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TareasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Tareas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tareas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'idtareas',
        'titulo',
        'descripcion:ntext',
        [
            'attribute' => 'proyecto_id',
            'label' => 'Proyecto',
            'value' => 'proyecto.nombre', // Accede directamente a la relación
            'filter' => ArrayHelper::map(Proyectos::find()->all(), 'idproyectos', 'nombre'),
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Tareas $model, $key, $index, $column) {
                return Url::toRoute([$action, 'idtareas' => $model->idtareas]);
            }
        ],
    ],
]); ?>

    <?php Pjax::end(); ?>

</div>
