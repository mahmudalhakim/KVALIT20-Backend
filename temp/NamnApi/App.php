<?php

class App
{

    public static $endpoint = "http://api.namnapi.se/v2/names.json";

    public static function main()
    {

        try {
            $array = self::get_data();
            self::view_data($array);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function get_data()
    {

        $json = @file_get_contents(self::$endpoint);

        if (!$json)
            throw new Exception("Cannot access " . self::$endpoint);

        return json_decode($json, true);
    }

    public static function view_data($array)
    {
        $names_array = $array['names'];
        $list = "<ul>";
        foreach ($names_array as $key => $value) {
            $list .=  "<li>";
            $list .= "$value[firstname] $value[surname]";
            $list .= "</li>";
        }
        $list .= "</ul>";
        echo $list;
    }
}
