<?php

app()->post('/login', "UsersController@login");

app()->post('/register', "UsersController@register");

app()->post('/recover-account', "UsersController@recover_account");

app()->post('/reset-password', "UsersController@reset_password");