<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Titulo */

$this->title = 'Update Título: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Títulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'idCategoria' => $model->idCategoria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
