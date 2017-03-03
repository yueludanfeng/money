<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 14:25
 */
namespace Article;

const PATH = '/article';

function getCommentTotal() {
    return 100;
}

class Comment { }


namespace MessageBoard;

function br(){
    echo "<br>";
}
const PATH = '/message_board';

function getCommentTotal() {
    return 300;
}

class Comment { }

// 调用当前空间的常量、函数和类
echo PATH; ///message_board
br();
echo getCommentTotal(); //300
br();
$comment = new Comment();

// 调用 Article 空间的常量、函数和类
echo \Article\PATH; ///article
br();
echo \Article\getCommentTotal(); //100
br();
$article_comment = new \Article\Comment();
br();
