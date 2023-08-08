<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Информация по сайту';
	return AdminSection::view($content, 'Панель');
}])->middleware(['auth','admin']);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);