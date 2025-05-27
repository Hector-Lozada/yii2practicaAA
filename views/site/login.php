<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Iniciar Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, ingrese su nombre de usuario y contraseña para acceder:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-4 col-form-label'],
                    'inputOptions' => ['class' => 'form-control', 'autocomplete' => 'off'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')
                ->textInput(['autofocus' => true, 'placeholder' => 'Nombre de usuario', 'required' => true])
                ->label('Usuario <span class="text-danger">*</span>', ['encode' => false]) ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['placeholder' => 'Contraseña', 'required' => true])
                ->label('Contraseña <span class="text-danger">*</span>', ['encode' => false]) ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"form-check\">{input} {label}</div>\n{error}",
                'labelOptions' => ['class' => 'form-check-label'],
                'inputOptions' => ['class' => 'form-check-input'],
            ]) ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="mt-4 text-muted">
                ¿No tienes una cuenta? Contacta al administrador.
            </div>

        </div>
    </div>
</div>