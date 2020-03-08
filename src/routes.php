<?php

return [
    '~^$~' => [\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\Controllers\ArticlesController::class, 'add'],
    '~^users/register$~' => [\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\Controllers\UsersController::class, 'activate'],
    '~^users/login~' => [\Controllers\UsersController::class, 'login'],
    '~^user/logout~' => [\Controllers\UsersController::class, 'logout'],
];

?>