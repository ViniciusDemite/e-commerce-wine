<?php

app()->get("/", function () {
    response()->json(["message" => "Congrats!! You're on Leaf API"]);
});

app()->get("/teste", function () {
    response()->json(["message" => "Teste page!!"]);
});

app()->get("/app", function () {
    // app() returns $app
    response()->json(app()->routes());
});
