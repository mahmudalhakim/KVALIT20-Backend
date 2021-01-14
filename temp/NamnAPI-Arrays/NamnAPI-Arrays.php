<?php

class App
{

    public static $endpoint = "http://api.namnapi.se/v2/names.json?limit=1000";

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
        $names_array = $array['names'];


        $lastNames = [];
        foreach ($names_array as $key => $value) {
            $lastNames[] = $value['surname'];
        }
        $lastNames = array_unique($lastNames);
        sort($lastNames);
        $file = "lastNames.php";
        file_put_contents($file, "<?php\n\$lastNames = ".var_export($lastNames, true).";\n?>");

    }
}

App::main();
