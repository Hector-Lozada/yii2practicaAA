<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Empleados $model */

$this->title = $model->idempleados;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empleados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idempleados' => $model->idempleados], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idempleados' => $model->idempleados], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idempleados',
            'nombre',
            'email:email',
            'cargo',
            [
                'attribute' => 'image_path',
                'format' => 'html',
                'value' => function($model) {
                    if ($model->image_path) {
                        return Html::img($model->image_path, [
                            'style' => 'max-width: 300px; max-height: 300px;',
                            'class' => 'img-thumbnail',
                            'alt' => 'Immagen',
                        ]);
                    }
                    return 'No hay imagen';
                },
            ],
            'fecha_ingreso',
        ],
    ]) ?>

</div>
