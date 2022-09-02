<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$catname = filter_var($data['catname'], FILTER_SANITIZE_STRING);
$catdesc = filter_var($data['catdesc'], FILTER_SANITIZE_STRING);

$awards = new Awards();

if($awards->setCategory($catname, $catdesc)) {
    echo 'success';
}