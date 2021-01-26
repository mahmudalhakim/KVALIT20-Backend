<?php

/**
 * En klass som beskriver en produkt
 */
class product
{
    /**
     * Instansvariabler (Varje produkt har ett namn, beskrivning, bild och pris.)
     */
    private $name;
    private $description;
    private $price;
    private $image;

    /**
     * Konstruktor
     */
    public function __construct($name, $description, $price, $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * En metdod som konverterar ett objekt till en array (nycklar på vänster sida)
     */
    public function toArray()
    {
        $array = array(
            "name"         => $this->name,
            "description"  => $this->description,
            "price"        => $this->price,
            "image"        => $this->image,
        );

        // print_r($array);

        return $array;
    }
}
