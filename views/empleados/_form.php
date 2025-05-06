<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Empleados $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <small class="text-muted">Formatos permitidos: png, jpg, jpeg, gif (max 5MB)</small>

    <?php if (!$model->isNewRecord && $model->image_path): ?>
        <div class="form-group">
            <label>Imagen Actual</label>
            <div>
                <img src="<?= $model->image_path ?>" alt="Imagen del trade" style="max-width: 200px; max-height: 200px;">
            </div>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
