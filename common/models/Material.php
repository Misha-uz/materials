<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $id
 * @property int $type_id
 * @property int $category_id
 * @property string $name
 * @property string $author
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $type
 * @property Category $category
 */
class Material extends BaseTimestamp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'category_id', 'name'], 'required','message' => 'Пожалуйста, заполните поле'],
            [['type_id', 'category_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['name', 'author'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'author' => 'Author',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function getTags(){
        return $this->hasMany(MaterialConnectTag::className(),[''=>'type_id']);
    }
    public function getCategories(){
        return $this->hasMany(Category::className(),['id'=>'category_id']);
    }
    public function getTag(){
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('material_connect_tag', ['material_id' => 'id']);
    }
}
