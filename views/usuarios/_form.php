<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuarios-form card shadow-sm border-0 mt-4">
    <div class="card-body">

        <?php $form = ActiveForm::begin([
            'options' => ['autocomplete' => 'off']
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'username')
                    ->textInput(['maxlength' => true, 'required' => true, 'placeholder' => 'Ingrese el nombre de usuario'])
                    ->label('Nombre de usuario <span class="text-danger">*</span>', ['encode' => false]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'email')
                    ->input('email', ['maxlength' => true, 'required' => true, 'placeholder' => 'ejemplo@correo.com'])
                    ->label('Correo electrónico <span class="text-danger">*</span>', ['encode' => false]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'password')
                    ->passwordInput(['maxlength' => true, 'required' => true, 'placeholder' => 'Ingrese la contraseña'])
                    ->label('Contraseña <span class="text-danger">*</span>', ['encode' => false]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'rol')
                    ->dropDownList([
                        'admin' => 'Administrador',
                        'usuario' => 'Usuario',
                        'editor' => 'Editor',
                    ], ['prompt' => 'Seleccione un rol', 'required' => true])
                    ->label('Rol <span class="text-danger">*</span>', ['encode' => false]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'nombre')
                    ->textInput(['maxlength' => true, 'required' => true, 'placeholder' => 'Ingrese el nombre'])
                    ->label('Nombre <span class="text-danger">*</span>', ['encode' => false]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'apellido')
                    ->textInput(['maxlength' => true, 'required' => true, 'placeholder' => 'Ingrese el apellido'])
                    ->label('Apellido <span class="text-danger">*</span>', ['encode' => false]) ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'activo')
                    ->dropDownList([1 => 'Activo', 0 => 'Inactivo'], ['prompt' => 'Seleccione el estado', 'required' => true])
                    ->label('Estado <span class="text-danger">*</span>', ['encode' => false]) ?>
            </div>
        </div>

        <div class="form-group mt-4">
            <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <p class="text-muted mt-3"><span class="text-danger">*</span> Campos obligatorios</p>
    </div>
</div>