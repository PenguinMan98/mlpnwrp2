<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'conversation_id')->textInput() ?>

    <?= $form->field($model, 'public')->checkbox() ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= $form->field($model, 'adult')->checkbox() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'character_id')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'last_modified')->textInput() ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'chat_name_color')->textInput(['maxlength' => 7]) ?>

    <?= $form->field($model, 'chat_text_color')->textInput(['maxlength' => 7]) ?>

    <?= $form->field($model, 'viewed')->textInput() ?>

    <?= $form->field($model, 'last_viewed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
