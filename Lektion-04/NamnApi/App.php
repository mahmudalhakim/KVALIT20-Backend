<?php

class App
{

    // Hämta 10 namn från 
    // https://namnapi.se/
    public static $endpoint = "https://api.namnapi.se/v2/names.json";

    public static function main($count)
    {

        if($count){
            self::$endpoint = self::$endpoint . "?limit=$count";
            //echo  self::$endpoint; 
        }
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

    public static function viewData($array){

        $names = $array['names'];

        $list = "<ul class='list-group'>";
        foreach ($names as $key => $name) {
            $list .= "
                    <li class='list-group-item'>
                        $name[firstname] $name[surname]
                    </li>
                    ";
        }
        $list .= "</ul>";
        
        echo $list;

    }

}
