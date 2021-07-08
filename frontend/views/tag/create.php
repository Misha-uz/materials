<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tag */

$this->title = 'Добавить тег';
//$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>


    <h1 class="my-md-5 my-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

