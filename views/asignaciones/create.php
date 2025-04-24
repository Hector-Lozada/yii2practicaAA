<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Asignaciones $model */

$this->title = Yii::t('app', 'Create Asignaciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asignaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
