<?php 

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Comentarios $model */

$this->title = $model->idcomentarios;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comentarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comentarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->rol === 'admin'): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idcomentarios' => $model->idcomentarios], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idcomentarios' => $model->idcomentarios], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php endif; ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'idcomentarios',
        [
            'attribute' => 'tarea_id',
            'value' => $model->tarea ? $model->tarea->titulo : null, // Ajusta 'nombre' al campo correcto de Tarea
            'label' => 'Tarea'
        ],
        [
            'attribute' => 'empleado_id',
            'value' => $model->empleado ? $model->empleado->nombre : null, // Ajusta 'nombre' al campo correcto de Empleado
            'label' => 'Empleado'
        ],
        'comentario:ntext',
        'fecha',
    ],
]) ?>

</div>
