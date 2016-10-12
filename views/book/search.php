<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
?>
<h1>Задание 3 - поиск по автору</h1>

<p>
    Вывести страницу с поиском книг по автору. 
    На странице отобразить следующую информацию: автор - количество книг с его авторством, список книг (название, количество просмотров). 
    Книги сортировать по количеству просмотров.    
</p>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <form name="AuthorSearch" action="<?= Url::current() ?>" method="post">
            <label>Введите имя автора:</label>
            <input type="text" name="author" placeholder="Введите имя автора" value="<?= $author ?>">
            <?= Html::submitButton('Поиск', ['class' => 'btn- btn-primary']); ?>
        </form>
    </div>
</div>

<?php if ($author) : ?>
    <hr/>
    <h2>Книги автора <?= $author ?></h2>
    <?php if ($books) : ?>
    <p>Найдено книг: <strong><?= count($books) ?></strong></p>        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'hits',
        ],
    ]); ?>
    
    <?php else: ?>
    <div class="row">
        <div class="col-lg-12">
            <p>Книги не найдены</p>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>

