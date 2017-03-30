<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Titulo;

/* @var $this yii\web\View */
/* @var $model app\models\Subtitulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subtitulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'idTitulo')->dropDownList(
        ArrayHelper::map(Titulo::find()->all(), 'id', 'nome'),['prompt'=>'Selecione o Título']
    )
    ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
