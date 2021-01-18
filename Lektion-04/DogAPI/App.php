<?php

class App
{

    public static $endpoint = "https://dog.ceo/api/breeds/list/all";

    public static function main()
    {

        try {
            $array = self::getData();
            self::viewData($array);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getData()
    {

        $json = @file_get_contents(self::$endpoint);


        if (!$json)
            throw new Exception("
                <div class='alert alert-danger m-5' role='alert'>
                    Problem med att hämta data just nu! <br>
                    Försök igen senare!
                </div>
            ");

        return json_decode($json, true);
    }

    public static function viewData($array)
    {
        $dog_array = $array['message'];

        $list = "<ol>";
        foreach ($dog_array as $breed => $value) {
            $Breed = ucfirst($breed); // Make a string's first character uppercase
            $list .= "
                    <li>
                        <a href='?breed=$breed'>$Breed</a>
                    </li>
                    ";
                    // <a href='?breed=affenpinscher'>Affenpinscher</a>
                
        }
        $list .= "</ol>";

        echo $list;
    }


    public static function images()
    {
        if (isset($_GET['breed'])) {
            self::get_images($_GET['breed']);
        } else {
            self::get_random_image();
        }
    }

    public static function get_images($breed)
    {

        self::$endpoint = "https://dog.ceo/api/breed/$breed/images";
        //echo self::$endpoint;

        try {
            $array = self::getData();
        } catch (Exception $e) {
            echo $e->getMessage();
            // echo '<pre>'. $e->getTraceAsString() . '</pre>';
            exit();
        }

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

        try {
            $array = self::getData();
        } catch (Exception $e) {
            echo $e->getMessage();
            // echo '<pre>'. $e->getTraceAsString() . '</pre>';
            exit();
        }

        $image = $array['message'];

        echo "  <h1 class='text-center'>
                    <a href='index.php'>Random image</a>
                </h1>
                <img class='img-thumbnail mt-1' style='width:90%' 
                    src='$image' alt='Random Image'
                >";
    }
}
