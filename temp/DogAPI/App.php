<?php

class App
{

    public static $endpoint = "https://dog.ceo/api/breeds/list/all";

    public static function main()
    {

        try {
            $array = self::getDate();
            self::viewData($array);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getDate()
    {

        $json = @file_get_contents(self::$endpoint);

        if (!$json)
            throw new Exception("Cannot access " . self::$endpoint);

        return json_decode($json, true);
    }

    public static function viewData($array)
    {
        $dog_array = $array['message'];
        $list = "<ol>";
        foreach ($dog_array as $breed => $value) {
            $list .= "<li>";
            $list .= "<a href='?breed=$breed'>";
            $list .= ucfirst($breed);
            $list .= "</a>";
            $list .= "</li>";
        }
        $list .= "</ol>";

        echo $list;
    }


    public static function images()
    {
        if (isset($_GET['breed'])) {
            self::get_images();
        } else {
            self::get_random_image();
        }
    }

    public static function get_images()
    {
        $breed = $_GET['breed'];
        self::$endpoint = "https://dog.ceo/api/breed/$breed/images";
        $array = self::getDate();
        $dog_array = $array['message'];

        $result = "<h1 class='text-center'>" . strtoupper($breed) . "</h1>";
        $result .= "<div class='row'>";
        foreach ($dog_array as $key => $image) {
            $result .= "
            <div class='col-sm-6 col-md-4 col-lg-3 col-xl-2'>
            <a href='$image' data-lightbox='$breed'  data-title='$breed'>
            <img class='img-thumbnail' src='$image' alt='$breed'>
            </a>
            </div>";
        }
        $result .= "</div>";
        echo $result;
    }

    public static function get_random_image()
    {
        self::$endpoint = "https://dog.ceo/api/breeds/image/random";
        $array = self::getDate();
        $image = $array['message'];

        echo "<h1 class='text-center'>
        <a href='index.php'>Random image</a></h1>
        <img class='img-thumbnail mt-1' style='width:90%' 
        src='$image' alt='Random Image'>";
    }
}
