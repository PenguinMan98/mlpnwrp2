<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-register">

    <?php
        foreach( Yii::$app->session->allFlashes as $key => $message ){
            echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
        }
    ?>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_name') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'birth_date') ?>
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>

        <div class="g-recaptcha" data-sitekey="6LeDUQITAAAAAHevvmSfM0_12Vh-XPGar0E0kxW_"></div>
        <br>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
