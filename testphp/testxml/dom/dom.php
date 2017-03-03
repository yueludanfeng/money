<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 12:02
 */

$doc = new DOMDocument();
$doc->load( 'books.xml' );

$books = $doc->getElementsByTagName( "book" );
foreach( $books as $book )
{
    $authors = $book->getElementsByTagName( "author" );
    //在js中使用的是$status[0],而在php中使用的是item(0),此即是区别
    $author = $authors->item(0)->nodeValue;

    $publishers = $book->getElementsByTagName( "publisher" );
    $publisher = $publishers->item(0)->nodeValue;

    $titles = $book->getElementsByTagName( "title" );
    $title = $titles->item(0)->nodeValue;

    echo "$title - $author - $publisher<br>";
}