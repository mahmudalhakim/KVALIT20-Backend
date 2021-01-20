<?php

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
     * En statisk array för att lagra alla memes (titlar och bilder)
     * Arrayen skapas när man skapar ett första objekt av klassen (i konstruktorn)
     */
    private static $memes;

    /**
     * Konstrukor 
     */
    public function __construct($author)
    {
        $this->author = $author;
        $this->date = self::getDate();
        $this->text = self::getText();

        // Prestandaoptimering
        // -------------------
        // Viktigt att testa om arrayen är redan skapad
        // för att slippa nollställa och återskapa arrayen flera gånger
        if (!isset(self::$memes))
            self::$memes = self::getMemes();

        $index = rand(0, 99);
        $this->title = self::getTitle($index);
        $this->image = self::getImage($index);
        
    }


    /**
     * En klassmetod som generear ett datum 
     * från och med dagens datum och en månad bakåt i tiden
     */
    public static function getDate()
    {
        $min = strtotime("-1 month");
        $max = strtotime("now");
        $randomInteger = rand($min, $max);
        $date = date('Y-m-d H:i', $randomInteger);
        return $date;
    }


    /**
     * En klassmetod som hämtar random text från loripsum.net
     */
    private static function getText()
    {
        return file_get_contents("https://loripsum.net/api/3/short/headers");
    }


    /**
     * En klassmetod som hämtar 100 st memes från imgflip.com
     */
    private static function getMemes()
    {
        $json = file_get_contents("https://api.imgflip.com/get_memes");
        $array = json_decode($json, true);
        $memesArray = $array['data']['memes'];
        //print_r($memesArray);

        return $memesArray;
    }

    /**
     * 
     */
    public static function getTitle($index)
    {
        $title = self::$memes[$index]['name'];
        return $title;
    }

    /**
     * 
     */
    public static function getImage($index)
    {
        $image = self::$memes[$index]['url'];
        return $image;
    }


    /**
     * 
     */
    public function toArray()
    {
        $array = array(
            "author" => $this->author,
            "date" => $this->date,
            "title" => $this->title,
            "image" => $this->image,
            "text" => $this->text
        );
        return $array;
    }
}


/*
$test1 = new Post("POST 1");
print_r($test1->toArray());
$test2 = new Post("POST 2");
print_r($test2->toArray());
*/