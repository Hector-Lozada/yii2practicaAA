<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tareas $model */

$this->title = Yii::t('app', 'Update Tareas: {name}', [
    'name' => $model->idtareas,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tareas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtareas, 'url' => ['view', 'idtareas' => $model->idtareas]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tareas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
