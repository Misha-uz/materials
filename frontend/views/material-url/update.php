<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MaterialUrl */

$this->title = 'Update Material Url: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Material Urls', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-url-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
