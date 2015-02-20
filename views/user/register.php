<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-register">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_name') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'about_me') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'birth_date') ?>
        <?= $form->field($model, 'signup_date') ?>
        <?= $form->field($model, 'forum_post_count') ?>
        <?= $form->field($model, 'chat_post_count') ?>
        <?= $form->field($model, 'last_activity') ?>
        <?= $form->field($model, 'login_attempts') ?>
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'avatar') ?>
        <?= $form->field($model, 'signup_ip') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
