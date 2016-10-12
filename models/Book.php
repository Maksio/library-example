<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $annotation
 * @property integer $publish_year
 * @property integer $hits
 *
 * @property Category $category
 * @property BookAuthor[] $bookAuthors
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'annotation', 'publish_year'], 'required'],
            [['category_id', 'publish_year', 'hits'], 'integer'],
            [['annotation'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Категория',
            'category_id' => 'Category ID',
            'title' => 'Название книги',
            'annotation' => 'Аннотация',
            'publish_year' => 'Год выпуска',
            'authors' => 'Автор',
            'hits' => 'Просмотров',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::className(), ['book_id' => 'id']);
    }
    
    public function bookInfo($id) {
        $sql = "SELECT b.title, b.publish_year, "
                . "(SELECT GROUP_CONCAT(a2.name SEPARATOR ', ') as name "
                . "FROM author a2, book b2, book_author ba2 "
                . "where (a2.id = ba2.author_id) and (b2.id = ba2.book_id) and b2.id = b.id) as authors, b.annotation "
                . "FROM book b WHERE id = $id";

        return self::findBySql($sql)->asArray()->one();
    }
}
