<?php

app()->mount('/users', function () {
  app()->get('/me', "UsersController@user");

  app()->put('/', "UsersController@edit");
});