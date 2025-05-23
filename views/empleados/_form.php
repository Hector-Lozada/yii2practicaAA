<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Empleados $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empleados-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese el nombre completo del empleado',
                'required' => true,
                'class' => 'form-control'
            ])->label('Nombre <span class="text-danger">*</span>') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput([
                'maxlength' => true,
                'placeholder' => 'ejemplo@empresa.com',
                'type' => 'email',
                'required' => true,
                'class' => 'form-control'
            ])->label('Correo electrónico <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'cargo')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ej: Gerente, Analista, Desarrollador',
                'required' => true,
                'class' => 'form-control'
            ])->label('Cargo <span class="text-danger">*</span>') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'fecha_ingreso')->input('date', [
                'class' => 'form-control',
                'required' => true,
                'value' => $model->isNewRecord ? '' : Yii::$app->formatter->asDate($model->fecha_ingreso, 'yyyy-MM-dd')
            ])->label('Fecha de Ingreso <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'imageFile')->fileInput([
                    'required' => $model->isNewRecord,
                    'accept' => 'image/png, image/jpeg, image/jpg, image/gif',
                    'class' => 'form-control-file'
                ])->label('Foto del empleado ' . ($model->isNewRecord ? '<span class="text-danger">*</span>' : '')) ?>
                <small class="form-text text-muted">Formatos: PNG, JPG, JPEG, GIF (Max. 5MB)</small>
            </div>
        </div>

        <div class="col-md-6">
            <?php if (!$model->isNewRecord && $model->image_path): ?>
                <div class="form-group">
                    <label class="control-label">Imagen Actual</label>
                    <div>
                        <?= Html::img('@web/uploads/images/' . $model->image_path, [
                            'alt' => 'Imagen del empleado',
                            'class' => 'img-thumbnail',
                            'style' => 'max-width: 150px; max-height: 150px;'
                        ]) ?>
                        <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group text-right mt-4">
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-secondary mr-2']) ?>
        <?= Html::submitButton('Guardar Empleado', [
            'class' => 'btn btn-primary',
            'style' => 'min-width: 150px;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>