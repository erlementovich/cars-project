<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use App\Models\Category;
use App\Models\Car;
use App\Models\Article;

/* Главная страница */
Breadcrumbs::for('main', function ($trail) {
    $trail->push('Главная', route('main'));
});

$staticPages = [
    [
        'title' => 'О нас',
        'name' => 'about'
    ],
    [
        'title' => 'Контакты',
        'name' => 'contacts'
    ],
    [
        'title' => 'Финансовый отдел',
        'name' => 'financial'
    ],
    [
        'title' => 'Условия продаж',
        'name' => 'sales'
    ],
    [
        'title' => 'Для клиентов',
        'name' => 'clients'
    ],
    [
        'title' => 'Аккаунт',
        'name' => 'account'
    ],
    [
        'title' => 'Регистрация',
        'name' => 'register'
    ],
    [
        'title' => 'Авторизация',
        'name' => 'login'
    ],
    [
        'title' => 'Салоны',
        'name' => 'salons'
    ]
];

foreach ($staticPages as $page) {
    Breadcrumbs::for($page['name'], function ($trail) use ($page) {
        $trail->parent('main');
        $trail->push($page['title'], route($page['name']));
    });
}

/* Каталог */
Breadcrumbs::for('products.index', function ($trail) {
    $trail->parent('main');
    $trail->push('Каталог', route('products.index'));
});

/* Категории */
Breadcrumbs::for('categories.show', function ($trail, $categorySlug) {
    $category = Category::bySlug($categorySlug);
    $trail->parent('products.index');

    foreach ($category->ancestors as $ancestor) {
        $trail->push($ancestor->name, route('categories.show', $ancestor));
    }

    $trail->push($category->name, route('categories.show', $category));
});

/* Товары */
Breadcrumbs::for('products.show', function ($trail, $carID) {
    $car = Car::find($carID);
    $trail->parent('categories.show', $car->category->slug);
    $trail->push($car->name, route('products.show', $car));
});

/* Все новости */
Breadcrumbs::for('articles.index', function ($trail) {
    $trail->parent('main');
    $trail->push('Все новости', route('articles.index'));
});

/* Страница новости */
Breadcrumbs::for('articles.show', function ($trail, $articleSlug) {
    $article = Article::bySlug($articleSlug);
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.show', $article));
});

/* Страница создания новости */
Breadcrumbs::for('articles.create', function ($trail) {
    $trail->parent('articles.index');
    $trail->push('Создание новости', route('articles.create'));
});

/* Страница редактирования новости */
Breadcrumbs::for('articles.edit', function ($trail, $articleSlug) {
    $trail->parent('articles.show', $articleSlug);
    $trail->push('Редактирование новости', route('articles.edit', $articleSlug));
});
