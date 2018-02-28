<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");
header("X-Content-Type-Options: application/json");

require_once "../handler/handler.php";

if ("GET" === $_SERVER["REQUEST_METHOD"]) {
    $offset = isset($_GET["page"]) ? $_GET["page"] : 0;
    $content = isset($_GET["id"]) ? getAjaxSingle($_GET["id"]) : getAjaxContents($offset);
    echo $content;
} else {
    echo addNewArticle($_POST);
}
