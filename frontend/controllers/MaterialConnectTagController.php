<?php

namespace frontend\controllers;

use common\models\MaterialConnectTag;
use Yii;
use yii\base\BaseObject;
use yii\web\NotFoundHttpException;

class MaterialConnectTagController extends \yii\web\Controller
{
    public function actionAddTag(){

        $model = new MaterialConnectTag();
        $model->tag_id = Yii::$app->request->post('tag_id');
        $model->material_id = Yii::$app->request->post('material_id');
        $matetial_connect_tag = MaterialConnectTag::find()->where(['tag_id' => $model->tag_id, 'material_id' => $model->material_id])->one();
        if (!isset($matetial_connect_tag) && $model->save()) {
            return $this->renderAjax('/material/tag-view', ['model' => $model]);
        }
        else
            throw new NotFoundHttpException();
    }

    public function actionMaterialTagDelete($tag_id, $material_id){
        $model = MaterialConnectTag::find()->where(['material_id' => $material_id,'tag_id' => $tag_id])->one();
        if (isset($model))
            $model->delete();
        return '<option value="' . $model->tag_id . '">'.$model->tag->name.'</option>';
    }
}
