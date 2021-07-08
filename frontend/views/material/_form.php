<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-5 col-md-8">
        <?php $form = ActiveForm::begin(); ?>
        <div class="form-floating mb-3">
            <?= $form->field($model, 'type_id')->dropDownList($type_list,['prompt' =>'Выберите тип'])->label(false) ?>
        </div>
        <div class="form-floating mb-3">
            <?= $form->field($model, 'category_id')->dropDownList($category_list,['prompt' =>'Выберите категорию'])->label(false)?>
        </div>
        <div class="form-floating mb-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true,'placeholder' => 'Название'])->label(false) ?>
        </div>
        <div class="form-floating mb-3">
            <?= $form->field($model, 'author')->textInput(['maxlength' => true, 'placeholder' => 'Авторы'])->label(false) ?>
        </div>
        <div class="form-floating mb-3">
            <?= $form->field($model, 'description')->textarea(['rows' => 3, 'placeholder' => 'Описание'])->label(false) ?>
        </div>

            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
