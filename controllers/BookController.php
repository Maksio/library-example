<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use yii\data\SqlDataProvider;

class BookController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {       
        $sql = "SELECT b.id, b.title, c.name AS category, b.publish_year, b.hits, "
                . "(SELECT GROUP_CONCAT(a2.name SEPARATOR ', ') as name FROM author a2, book b2, book_author ba2 where (a2.id = ba2.author_id) and (b2.id = ba2.book_id) and b2.id = b.id) as authors "
                . "FROM book b JOIN category c ON c.id = b.category_id ORDER BY b.hits DESC";
        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
        
    }

    public function actionSearch()
    {
        $authorName = Yii::$app->request->post('author');
        if ($authorName) {
            $author = \app\models\Author::findOne(['name' => $authorName]);            
            $id = $author ? $author->id : -1;
            $books =  \app\models\Author::getBooks($id);
            $sql = "SELECT b.id, b.title, b.hits FROM book b JOIN book_author ba ON ba.book_id = b.id WHERE ba.author_id = {$id} ORDER BY b.hits DESC";
            $dataProvider = new SqlDataProvider([
                'sql' => $sql,
            ]);
        }
        
        return $this->render('search', ['author' => $authorName, 'books' => $books, 'dataProvider' => $dataProvider]);
    }

    public function actionView($id = null)
    {
        if (null === $id) 
                return $this->redirect(['book/index']);
        $model = Book::bookInfo($id);
        return $this->render('view', ['model' => $model]);
    }

}
