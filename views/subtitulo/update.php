<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subtitulo */

$this->title = 'Update Subtítulo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subtítulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'idTitulo' => $model->idTitulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subtitulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
