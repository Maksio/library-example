<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $name
 *
 * @property BookAuthor[] $bookAuthors
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Автор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks($id)
    {
        $sql = "SELECT b.title, b.hits FROM book b, book_author ba WHERE ba.book_id = b.id and ba.author_id = $id order by b.hits DESC";
        return self::findBySql($sql)->asArray()->all();
    }    
}
