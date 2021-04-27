<?php

require_once 'php/Post.php';


class App
{

    public static function main()
    {

        // Skapa 10 inlägg med hjälp av getData()
        $array = self::getData();

        // Visa inläggen med viewData
        self::viewData($array);
    }


    /**
     * Klassmetoden getData skapar en array som innehåller 10 inlägg
     * OBS! Varje inlägg är en array
     */
    public static function getData()
    {

        $bloggPosts = array();

        while (count($bloggPosts) < 10) {

            $postObject = new Post("Mahmud Al Hakim");
            $postArray = $postObject->toArray();

            array_push($bloggPosts, $postArray);
        }

        return $bloggPosts;
    }



    /**
     * Klassmetoden viewData skapar en mall (HTML-template)
     * och skickar mallen till klienten (webbläsare)
     */
    public static function viewData($array)
    {

        // print_r($array);

        // Sortera arrayen efter datum (fallande)
        // för att visa senaste inlägg högst upp
        $dates = array_column($array, 'date'); // Hämtar alla datum
        array_multisort($dates, SORT_DESC, $array);


        $template = "";

        foreach ($array as $key => $postArray) {
            $template .= "
            <div class='post-preview'>
                <h2 class='post-title'>
                    $postArray[title]
                </h2>
                <img 
                    src='$postArray[image]' 
                    alt='$postArray[title]'
                    class='img-fluid'>
                <div class='post-subtitle'>
                   $postArray[text]
                </div>
        
                <p class='post-meta'>Posted by $postArray[author]
                   on $postArray[date]</p>
            </div>
            <hr>";
        }

        echo $template;
        
    }
}
