<?php

app()->mount('/wine', function () {
  app()->get('/types', "WineTypesController@index");
});