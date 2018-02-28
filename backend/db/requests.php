<?php
/**
 * Created by PhpStorm.
 * User: Zyigh
 * Date: 28/02/2018
 * Time: 09:34
 */

function getPdo() : \PDO
{
    try {
        $pdo = new \PDO("mysql:host=localhost;port=3306;dbname=tuto_ajax", "root", "");
        $pdo->exec("SET NAMES UTF8");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch(PDOException $exception) {
        die($exception->getMessage());
    }
}

function getNextTenArticles (Int $offset, Bool $isForAjax = true)
{
    $pdo = getPdo();
    $sql = "
        SELECT
            a.`id` AS id, 
            LEFT(a.`title`, 8) AS title, 
            LEFT(a.`content`, 56) AS content, 
            a.`author` AS author
        FROM 
        `articles` a
        ORDER BY
            a.`id` DESC 
        LIMIT 10 
        OFFSET :offset
        ;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":offset", $offset, \PDO::PARAM_INT);
    $stmt->execute();

    if ("00000" !== $stmt->errorCode()[0]) {
        $dataInArray = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ($isForAjax) {

            return json_encode($dataInArray);
        }

        return $dataInArray;
    } else {
        var_dump($stmt->errorInfo());
        die();
    }
}

function getPagesNumber() : Int
{
    $pdo = getPdo();
    $sql = "SELECT FLOOR(COUNT(*)/10) AS max_page FROM `articles`;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_ASSOC)["max_page"];
}

function getOneArticle(Int $id, Bool $isForAjax = true)
{
    $pdo = getPdo();
    $sql = "
        SELECT 
            LEFT(a.`title`, 8) AS title,
            a.`author`,
            a.`content`
        FROM
            `articles` a
        WHERE
            a.`id` = :id
    ;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
    $stmt->execute();

    if ("00000" !== $stmt->errorCode()[0]) {
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($isForAjax) {

            return json_encode($data);
        }

        return $data;
    } else {
        die($stmt->errorCode()[2]);
    }
}
