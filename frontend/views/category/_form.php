<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-5 col-md-8">

    <?php $form = ActiveForm::begin(); ?>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Category[name]"  value="<?=$model->name?>"  placeholder="Напишите название" required oninvalid="this.setCustomValidity('Пожалуйста, заполните поле')" id="floatingName">
            <label for="floatingName">Название</label>
            <div class="invalid-feedback">
                Пожалуйста, заполните поле
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Добавить</button>

    <?php ActiveForm::end(); ?>

    </div>
</div>
