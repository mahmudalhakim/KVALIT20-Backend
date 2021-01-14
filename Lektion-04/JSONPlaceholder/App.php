<?php

class App
{

    public static $endpoint = "https://jsonplaceholder.typicode.com/users";

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

        if (!$json) {
            throw new Exception("
                <div class='alert alert-danger' role='alert'>
                    Problem med att hämta namn just nu!
                </div>
            ");
        }

        return json_decode($json, true);

    }

    public static function viewData($names){

        $list = "<ul class='list-group'>";
        foreach ($names as $key => $name) {
            $list .= "
                <li class='list-group-item'>
                    $name[name]
                </li>
                ";
        }
        $list .= "</ul>";

        // echo $list;

        echo "<hr>";
        
        $address = "";

        foreach ($names as $key => $name) {
            $address .= "
                <div class='address'>
                    <h4>$name[name] </h4>
                    <p>" 
                    . $name['address']['street']  . '<br>' 
                    . $name['address']['suite']   . '<br>' 
                    . $name['address']['zipcode'] . '<br>' 
                    . $name['address']['city'] .
                    "</p>
                </div>";
        }

        echo $address;

    }

}
