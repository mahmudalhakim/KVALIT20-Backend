<?php

class App
{

    public static $endpoint = "https://jsonplaceholder.typicode.com/users";

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

        self::view_table($array);
        echo "<hr>";
        self::view_address($array);
    }

    public static function view_table($array)
    {
        $table = "<table class='table'>";
        $table .= "<tr><th>Name</th><th>Email</th></tr>";
        foreach ($array as $key => $value) {
            $table .= "<tr>
                         <td> $value[name] </td>
                         <td> $value[email] </td>
                       </tr>";
        }
        $table .= "</table>";
        echo $table;
    }
    public static function view_address($array)
    {
        $result = "";
        foreach ($array as $key => $value) {
            $result .= "<div class='address'>";
            $result .= "<h4>" . $value['name'] . "</h4>";
            $result .= $value['address']['street'] . "<br>";
            $result .= $value['address']['suite'] . "<br>";
            $result .= $value['address']['zipcode'] . "<br>";
            $result .= $value['address']['city'] . "<br>";
            $result .= "</div>";
        }

        echo $result;
    }
}
