<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Material */


?>
<div class="material-create">
    <h1 class="my-md-5 my-4">Добавить материал</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type_list' => $type_list,
        'category_list' => $category_list,
    ]) ?>

</div>
