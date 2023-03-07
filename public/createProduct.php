<?php
echo '{"created":"true"}';
http_response_code(201);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');