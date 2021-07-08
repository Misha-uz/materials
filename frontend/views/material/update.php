<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Material */

$this->title = 'Обновить материал: ' . $model->name;

?>
<div class="material-update">

    <h1 class="my-md-5 my-4" ><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'type_list' => $type_list,
        'category_list' => $category_list,
    ]) ?>

</div>
