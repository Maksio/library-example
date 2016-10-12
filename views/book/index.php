<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
?>
<h1>Задание 1</h1>

<p>
    Вывести таблицу с доступными книгами, на которой будет отображена следующая информация: Название книги, категория, автор, год издания, количество просмотров книги.
</p>

<hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'category',
            'authors',
            //'annotation:ntext',
            'publish_year',
            'hits',

            [   
                'class' => 'yii\grid\ActionColumn',
                'template' => '{link}',
                'buttons' => [
                    'link' => function($url, $model) {                        
                        return Html::a('Смотреть', Url::to(['book/view', 'id' => $model['id']], true));
                    }
                ]
            ],
        ],
    ]); ?>

