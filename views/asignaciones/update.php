<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Asignaciones $model */

$this->title = Yii::t('app', 'Update Asignaciones: {name}', [
    'name' => $model->idasignaciones,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asignaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idasignaciones, 'url' => ['view', 'idasignaciones' => $model->idasignaciones]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="asignaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
