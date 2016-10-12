<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Library';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Абстрактная библиотека</h1>

        <p class="lead">Тестовое задание Тихонова М.Б. для Е. Емельяновой</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Задание 1</h2>

                <div class="well" style="min-height: 150px;">
                    <p>Вывести таблицу с доступными книгами, на которой будет отображена следующая информация: Название книги, категория, автор, год издания, количество просмотров книги.</p>
                </div>
                <p><a class="btn btn-default" href="<?= Url::to(['book/index']) ?>">Смотреть &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Задание 2</h2>
                <div class="well" style="min-height: 150px;">
                    <p>Вывести страницу просмотра книги: название, авторов, год издания, аннотацию.</p>
                </div>
                <p><a class="btn btn-default" href="<?= Url::to(['book/view', 'id'=>1]) ?>">Смотреть &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Задание 3</h2>
                <div class="well" style="min-height: 150px;">
                    <p>Вывести страницу с поиском книг по автору. На странице отобразить следующую информацию: автор - количество книг с его авторством, список книг (название, количество просмотров). Книги сортировать по количеству просмотров.</p>
                </div>
                <p><a class="btn btn-default" href="<?= Url::to(['book/search']) ?>">Смотреть &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
