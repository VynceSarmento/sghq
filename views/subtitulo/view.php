<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subtitulo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subtitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subtitulo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Subtitulo', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'idTitulo' => $model->idTitulo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'idTitulo' => $model->idTitulo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'titulo.nome',
        ],
    ]) ?>

</div>
