<?php


// Route::get('', ['as' => 'admin.dashboard', function () {
// 	$content = 'Информация по сайту';
// 	return AdminSection::view($content, 'Панель');
// }])->middleware(['admin', 'verified']);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Любая ваша информация.';
	return AdminSection::view($content, 'Информация');
}]);
