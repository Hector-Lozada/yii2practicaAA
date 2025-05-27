<?php

/** @var yii\web\View $this */

$this->title = 'UTELVT';
?>
<style>
.site-index {
    min-height: 80vh;
    background: url('<?= Yii::getAlias('@web/uploads/fondo/fondo.jpg') ?>') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
}

.site-index .overlay {
    background: rgba(255,255,255,0.8);
    padding: 3rem 2rem;
    border-radius: 20px;
    box-shadow: 0 2px 32px rgba(60,60,60,0.10);
    text-align: center;
}

.site-index h1 {
    font-size: 3rem;
    font-weight: bold;
    color: #003366;
}

.site-index .lead {
    font-size: 1.5rem;
    color: #222;
}
</style>

<div class="site-index">
    <div class="overlay">
        <h1 class="display-4">Bienvenido a UTELVT</h1>
        <p class="lead">Sistema de gestión de proyectos y tareas para la Universidad Técnica de El Valle de Tulancingo.</p>
        <img src="<?= Yii::getAlias('@web/uploads/fondo/fondo.jpg') ?>" alt="Fondo UTELVT" style="width: 300px; margin: 2rem auto 1rem auto; display: block; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.08);">
    </div>
</div>