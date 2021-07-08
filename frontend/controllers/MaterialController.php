<?php

namespace frontend\controllers;

use common\models\MaterialConnectTag;
use common\models\MaterialUrl;
use Yii;
use common\models\Material;
use common\models\search\MaterialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
class MaterialController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Material models.
     * @return mixed
     */
    public function actionIndex($string = null)
    {

        $query = Material::find();


        if (isset($string)){
            $query->orWhere(['like','material.name',$string]);
            $query->orWhere(['like','material.author',$string]);
            $query->joinWith('types')
                ->joinWith('categories');

            $query->orWhere(['like','type.name',$string]);
            $query->orWhere(['like','category.name',$string]);
        }
        $materials = $query->orderBy(['material.created_at'=>SORT_DESC])->all();

        return $this->render('index', [
            'materials' => $materials,
            'string' => $string,
        ]);
    }

    /**
     * Displays a single Material model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $tags = MaterialConnectTag::find()->where(['material_id' => $id])->all();
        $ulrs = MaterialUrl::find()->where(['material_id' => $id])->all();

        $ids = \yii\helpers\ArrayHelper::map($tags,'tag_id','tag_id');

        $tags_list =  \yii\helpers\ArrayHelper::map(\common\models\Tag::find()
            ->andWhere(['not in','id',$ids])
            ->all(),'id','name');

        return $this->render('view', [
            'model' => $this->findModel($id),
            'urls' => $ulrs,
            'tags' => $tags,
            'tags_list' => $tags_list,
        ]);
    }

    /**
     * Creates a new Material model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Material();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $type_list = \yii\helpers\ArrayHelper::map(\common\models\Type::find()->all(), 'id', 'name');
        $category_list = \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'name');
        return $this->render('create', [
            'model' => $model,
            'type_list' => $type_list,
            'category_list' => $category_list,
        ]);
    }

    /**
     * Updates an existing Material model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $type_list = \yii\helpers\ArrayHelper::map(\common\models\Type::find()->all(), 'id', 'name');
        $category_list = \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'name');

        return $this->render('update', [
            'model' => $model,
            'type_list' => $type_list,
            'category_list' => $category_list,
        ]);
    }

    /**
     * Deletes an existing Material model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Material model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Material the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Material::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
