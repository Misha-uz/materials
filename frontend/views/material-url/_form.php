<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MaterialUrl */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Редактировать ссылку</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form data-id="url-list<?=$model->id?>" action="<?=\yii\helpers\Url::to(['material-url/update','id' => $model->id])?>" id="material-url-form-update">
                <div class="form-floating mb-3">
                    <input type="text" name="MaterialUrl[author]" class="form-control" placeholder="Добавьте подпись"
                           id="floatingModalSignature"
                           value="<?= $model->author ?>"
                    >
                    <label for="floatingModalSignature">Подпись</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="MaterialUrl[url]" class="form-control" value="<?= $model->url ?>"
                           placeholder="Добавьте ссылку" id="floatingModalLink">
                    <label for="floatingModalLink">Ссылка</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <input type="hidden" name="MaterialUrl[material_id]" value="<?= $model->material_id ?>">
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" id="url_update_save" class="btn btn-primary">Редактировать</button>
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
        </div>
    </div>
</div>