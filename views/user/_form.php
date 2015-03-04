<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'about_me')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'birth_date')->textInput() ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'forum_post_count')->textInput() ?>

    <?= $form->field($model, 'chat_post_count')->textInput() ?>

    <?= $form->field($model, 'signup_date')->textInput() ?>

    <?= $form->field($model, 'signup_ip')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'last_activity')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 0]) ?>

    <?= $form->field($model, 'login_attempts')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
