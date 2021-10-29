<?php

return array(
    "database" => [
        "controller" => "database",
        "action" => "list"
    ],
    "database/domain/([0-9]+)" => [
        "controller" => "database",
        "action" => "list"
    ],
    "database/?page=([0-9]+)/s" => [
        "controller" => "database",
        "action" => "list"
    ],
    "print" => [
        "controller" => "database",
        "action" => "print"
    ],
    "" => [
        "controller" => "main",
        "action" => "index"
    ]
);
