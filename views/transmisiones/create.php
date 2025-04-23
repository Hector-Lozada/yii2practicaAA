<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Transmisiones $model */

$this->title = Yii::t('app', 'Create Transmisiones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transmisiones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transmisiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
