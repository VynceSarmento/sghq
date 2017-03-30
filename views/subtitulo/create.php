<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subtitulo */

$this->title = 'Novo Subtitulo';
$this->params['breadcrumbs'][] = ['label' => 'Subtitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subtitulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
