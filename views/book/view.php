<?php


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

?>
<h1>Задание 2</h1>

<p>
    Вывести страницу просмотра книги: название, авторов, год издания, аннотацию.
</p>
<?= Html::a('К списку книг', Url::to(['book/index']), ['class' => 'btn btn-default']) ?>
<hr/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'authors',
            'publish_year',
            'annotation:ntext',
        ],
    ]) ?>