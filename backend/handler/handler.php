<?php
/**
 * Created by PhpStorm.
 * User: Zyigh
 * Date: 28/02/2018
 * Time: 09:59
 */

//require_once "../../db/requests.php";
require_once "../db/requests.php";

function getContents(Int $pageNumber) : String
{
    ob_start();
    $data = getNextTenArticles($pageNumber * 10, false);
    $pages = getPagesNumber();
    require_once "../../view/home.php";

    return ob_get_clean();
}

function getSingle(Int $id) : String
{
    ob_start();
    $data = getOneArticle($id, false);
    require_once "../../view/single.php";

    return ob_get_clean();
}

function getAjaxContents(Int $pageNumber) : String
{
    return getNextTenArticles($pageNumber * 10);
}

function getAjaxSingle(Int $id) : String
{
    return getOneArticle($id);
}

function addNewArticle(array $data) : String
{
    if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["author"])) {

        return insertArticle();
    }

    http_response_code(403);
    return json_encode(["error" => "missing title, content or author"]);
}
