<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Suscripciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="suscripciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <?= $form->field($model, 'streamer_id')->textInput() ?>

    <?= $form->field($model, 'fecha_suscripcion')->textInput() ?>

    <?= $form->field($model, 'nivel')->dropDownList([ 'Tier 1' => 'Tier 1', 'Tier 2' => 'Tier 2', 'Tier 3' => 'Tier 3', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
