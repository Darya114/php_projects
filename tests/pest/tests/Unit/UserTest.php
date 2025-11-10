<?php

require_once __DIR__ . "/User.php";

it('getFullName возвращает корректное имя с фамилией', function () {
    $user = new User();
    $user->firstname = 'Дарья';
    $user->lastname = 'Васильчук';
    expect($user->getFullName())->toBe('Васильчук Дарья');
});

