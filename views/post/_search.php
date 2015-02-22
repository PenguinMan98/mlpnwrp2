<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'post_id') ?>

    <?= $form->field($model, 'conversation_id') ?>

    <?= $form->field($model, 'public')->checkbox() ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= $form->field($model, 'adult')->checkbox() ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'character_id') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'last_modified') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'chat_name_color') ?>

    <?php // echo $form->field($model, 'chat_text_color') ?>

    <?php // echo $form->field($model, 'viewed') ?>

    <?php // echo $form->field($model, 'last_viewed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
