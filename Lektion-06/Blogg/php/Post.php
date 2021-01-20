<?php

/**
 * Post är en klass som beskriver blogginlägg
 */
class Post
{

    /**
     * Instansvariabler
     */
    private $author;
    private $date;
    private $title;
    private $image;
    private $text;

    /**
     * En klassvariabel (statisk) som lagrar en array med 100 memes
     */
    private static $memes;


    /**
     * En konstruktor
     */
    public function __construct($author)
    {

        // Prestandaoptimering
        // Skapa arrayen $memes en enda gång
        if (!isset(self::$memes))
            self::getMemes();

        $this->author = $author;
        $this->date   = self::getDate();
        $this->text   = self::getText();

        $index = rand(0, count(self::$memes) - 1);
        $this->image  = self::getImage($index);
        $this->title  = self::getTitle($index);
    }

    /**
     * En metod som slumpgenererar datum
     * inom följande intervall
     * från och med dagens datum ($max)
     * och en månad bakåt i tiden ($min)
     */
    public static function getDate()
    {
        $min = strtotime("-1 month");
        $max = strtotime("now");
        $timestamp = rand($min, $max);
        $date = date('Y-m-d H:i', $timestamp);
        return $date;
    }



    /**
     * En klassmetod som hämtar text från https://loripsum.net/
     */
    public static function getText()
    {
        $endpoint = "https://loripsum.net/api/2/short/headers";
        return file_get_contents($endpoint);
    }


    /**
     * En klassmetod som hämtar titlar (name) och bilder från 
     * https://imgflip.com/api
     * 
     * Vi kommer att få 100st memes från APIet
     * https://sv.wikipedia.org/wiki/Internetfenomen
     */
    public static function getMemes()
    {

        // echo "<h1>TEST</h1>";
        $endpoint = "https://api.imgflip.com/get_memes";
        $json = file_get_contents($endpoint);
        $array = json_decode($json, true);
        self::$memes = $array['data']['memes'];
    }



    /**
     * En klassmetod som hämtar en bild (bildens URL)
     */
    public static function getImage($index)
    {

        $meme = self::$memes[$index];
        $url = $meme['url'];
        // return "https://picsum.photos/800/300";
        return $url;
    }


    /**
     * En klassmetod som hämtar titel 
     */
    public static function getTitle($index)
    {

        $meme = self::$memes[$index];
        return $meme['name'];
    }



    /**
     * En metod som konverterar ett objekt till en array
     */
    public function toArray()
    {

        $array = array(
            "author" => $this->author,
            "date"   => $this->date,
            "text"   => $this->text,
            "image"  => $this->image,
            "title"  => $this->title
        );

        return $array;
    }
}
