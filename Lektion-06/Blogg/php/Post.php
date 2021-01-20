<?php

/**
 * Post är en klass som beskriver blogginlägg
 */
class Post{

     /**
      * Instansvariabler
      */
      private $author; 
      private $date; 
      private $title; 
      private $image; 
      private $text; 

    /**
     * En konstruktor
     */
    public function __construct($author){
        $this->author = $author;
        $this->date   = self::getDate();
        $this->text   = self::getText(); 
    }

    /**
     * En metod som slumpgenererar datum
     * inom följande intervall
     * från och med dagens datum ($max)
     * och en månad bakåt i tiden ($min)
     */
    public static function getDate(){
        $min = strtotime("-1 month");
        $max = strtotime("now");
        $timestamp = rand($min, $max);
        $date = date('Y-m-d H:i' , $timestamp);
        return $date;
    }

    /**
     * En klassmetod som hämtar text från https://loripsum.net/
     */
    public static function getText(){
        $endpoint = "https://loripsum.net/api/2/short/headers";
        return file_get_contents($endpoint);
    }

    /**
     * En metod som konverterar ett objekt till en array
     */
    public function toArray(){

        $array = array(
            "author" => $this->author,
            "date"   => $this->date,
            "text"   => $this->text
        );

        return $array;

    }
    
}
