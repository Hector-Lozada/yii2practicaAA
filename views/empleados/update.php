<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Empleados $model */

$this->title = Yii::t('app', 'Update Empleados: {name}', [
    'name' => $model->idempleados,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idempleados, 'url' => ['view', 'idempleados' => $model->idempleados]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
