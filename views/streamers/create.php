<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Streamers $model */

$this->title = Yii::t('app', 'Create Streamers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Streamers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="streamers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
