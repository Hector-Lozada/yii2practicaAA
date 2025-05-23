<?php

use app\models\Empleados;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\EmpleadosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Empleados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Empleados'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idempleados',
            'nombre',
            'email:email',
            'cargo',
            [
    'attribute' => 'image_path',
    'format' => 'html',
    'value' => function($model) {
        // Verifica si hay una imagen
        if ($model->image_path) {
            // Genera la URL correcta (ajusta según tu estructura)
            $rutaImagen = Url::to('@web/uploads/images/' . basename($model->image_path));
            
            // Muestra la imagen con un estilo y texto alternativo
            return Html::img(
                $rutaImagen,
                [
                    'style' => 'width: 50px; height: auto;',
                    'alt' => 'Foto de ' . $model->nombre,
                ]
            );
        }
        // Si no hay imagen, muestra un placeholder o texto
        return Html::img(
            'https://via.placeholder.com/50',
            ['style' => 'width: 50px; height: auto;', 'alt' => 'Sin imagen']
        );
    },
],
            [
                'attribute' => 'fecha_ingreso',
                'format' => ['date', 'php:Y-m-d'], // Formato de fecha sin hora
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Empleados $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idempleados' => $model->idempleados]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>