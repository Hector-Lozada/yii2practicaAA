<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Proyectos $model */

$this->title = Yii::t('app', 'Update Proyectos: {name}', [
    'name' => $model->idproyectos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproyectos, 'url' => ['view', 'idproyectos' => $model->idproyectos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="proyectos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
