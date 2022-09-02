<?php
require_once __DIR__ .'/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$data = json_decode(@file_get_contents("php://input"), true);

if(isset($data['contestId']) && !empty($data['contestId'])) {
    $contestId = filter_var($data['contestId'], FILTER_SANITIZE_STRING);
    $a_wins = filter_var($data['awins'], FILTER_SANITIZE_STRING);
    $a_wins_tko = filter_var($data['awinstko'], FILTER_SANITIZE_STRING);
    $a_wins_split = filter_var($data['awinsplit'], FILTER_SANITIZE_STRING);
    $a_wins_unanimous = filter_var($data['awinsunanimous'], FILTER_SANITIZE_STRING);
    $a_r1_tko = filter_var($data['ar1tko'], FILTER_SANITIZE_STRING);
    $a_r2_tko = filter_var($data['ar2tko'], FILTER_SANITIZE_STRING);
    $a_r3_tko = filter_var($data['ar3tko'], FILTER_SANITIZE_STRING);
    $a_r4_tko = filter_var($data['ar4tko'], FILTER_SANITIZE_STRING);
    $a_r5_tko = filter_var($data['ar5tko'], FILTER_SANITIZE_STRING);
    $a_r6_tko = filter_var($data['ar6tko'], FILTER_SANITIZE_STRING);
    $a_r7_tko = filter_var($data['ar7tko'], FILTER_SANITIZE_STRING);
    $a_r8_tko = filter_var($data['ar8tko'], FILTER_SANITIZE_STRING);
    $a_r9_tko = filter_var($data['ar9tko'], FILTER_SANITIZE_STRING);
    $a_r10_tko = filter_var($data['ar10tko'], FILTER_SANITIZE_STRING);
    $a_r11_tko = filter_var($data['ar11tko'], FILTER_SANITIZE_STRING);
    $a_r12_tko = filter_var($data['ar12tko'], FILTER_SANITIZE_STRING);
    $draw = filter_var($data['draw'], FILTER_SANITIZE_STRING);  
    $b_wins = filter_var($data['bwins'], FILTER_SANITIZE_STRING);  
    $b_wins_tko = filter_var($data['bwinstko'], FILTER_SANITIZE_STRING);  
    $b_wins_split = filter_var($data['bwinsplit'], FILTER_SANITIZE_STRING);   
    $b_wins_unanimous = filter_var($data['bwinsunanimous'], FILTER_SANITIZE_STRING); 
    $b_r1_tko = filter_var($data['br1tko'], FILTER_SANITIZE_STRING);  
    $b_r2_tko = filter_var($data['br2tko'], FILTER_SANITIZE_STRING);   
    $b_r3_tko = filter_var($data['br3tko'], FILTER_SANITIZE_STRING);  
    $b_r4_tko = filter_var($data['br4tko'], FILTER_SANITIZE_STRING);  
    $b_r5_tko = filter_var($data['br5tko'], FILTER_SANITIZE_STRING);   
    $b_r6_tko = filter_var($data['br6tko'], FILTER_SANITIZE_STRING);   
    $b_r7_tko = filter_var($data['br7tko'], FILTER_SANITIZE_STRING);   
    $b_r8_tko = filter_var($data['br8tko'], FILTER_SANITIZE_STRING);   
    $b_r9_tko = filter_var($data['br9tko'], FILTER_SANITIZE_STRING);  
    $b_r10_tko = filter_var($data['br10tko'], FILTER_SANITIZE_STRING);  
    $b_r11_tko = filter_var($data['br11tko'], FILTER_SANITIZE_STRING);  
    $b_r12_tko = filter_var($data['br12tko'], FILTER_SANITIZE_STRING);
}
    

// Update contest info
$contests = new Contest();
if($contests->updateContest($contestId, $a_wins, $a_wins_tko, $a_wins_split, $a_wins_unanimous, $a_r1_tko, $a_r2_tko, $a_r3_tko, $a_r4_tko, $a_r5_tko, $a_r6_tko, $a_r7_tko, $a_r8_tko, $a_r9_tko, $a_r10_tko, $a_r11_tko, $a_r12_tko, $draw, $b_wins, $b_wins_tko, $b_wins_split, $b_wins_unanimous, $b_r1_tko, $b_r2_tko, $b_r3_tko, $b_r4_tko, $b_r5_tko, $b_r6_tko, $b_r7_tko, $b_r8_tko, $b_r9_tko, $b_r10_tko, $b_r11_tko, $b_r12_tko)) {
    echo 'success';
}