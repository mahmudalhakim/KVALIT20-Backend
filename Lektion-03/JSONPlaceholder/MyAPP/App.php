<?php

class App
{
    public static $endpoint = "https://jsonplaceholder.typicode.com/users";

    public static function main()
    {

        try {
            $array = self::getData();
            // print_r($array);
            self::viewData($array);
        } 
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getData()
    {

        $json = @file_get_contents(self::$endpoint);
        // @ = Error Control Operator

        if (!$json)
            throw new Exception("Cannot access " . self::$endpoint);

        // Returnera data som en PHP-Array
        return json_decode($json, true);
    }

    public static function viewData($array){

        $table = "<table class='table'>";
        $table .= "<tr><th>Name</th><th>Email</th></tr>";
        foreach ($array as $key => $value) {
            $table .= "<tr>
                        <td>$value[name] </td>
                        <td>$value[email] </td>
                       </tr>";
        }
        $table .= "</table>";

        echo $table;
    }
}
