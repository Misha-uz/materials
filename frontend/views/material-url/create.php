<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

//$this->title = 'Create Material Url';
//$this->params['breadcrumbs'][] = ['label' => 'Material Urls', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  id="material-url-form">
                <div class="form-floating mb-3">
                    <input type="text" name="MaterialUrl[author]" class="form-control" placeholder="Добавьте подпись"
                           id="floatingModalSignature">
                    <label for="floatingModalSignature">Подпись</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="MaterialUrl[url]" class="form-control" placeholder="Добавьте ссылку" id="floatingModalLink">
                    <label for="floatingModalLink">Ссылка</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <input type="hidden" name="MaterialUrl[material_id]" value="<?=$material_id?>">
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" id = "url_save" class="btn btn-primary">Добавить</button>
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
        </div>
    </div>
</div>
