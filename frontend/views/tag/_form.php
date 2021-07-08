<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="row">
        <div class="col-lg-5 col-md-8">
    <?php $form = ActiveForm::begin(); ?>
            <div class="form-floating mb-3">
                <input type="text"  name="Tag[name]"  value="<?=$model->name?>" class="form-control" required oninvalid="this.setCustomValidity('Пожалуйста, заполните поле')" placeholder="Напишите название" id="floatingName">
                <label for="floatingName">Название</label>
                <div class="invalid-feedback">
                    Пожалуйста, заполните поле
                </div>
            </div>
    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>

