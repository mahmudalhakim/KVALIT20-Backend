<?php

require_once('php/Post.php');

class App
{

    public static function main()
    {
        $array = self::getData();
        self::viewData($array);
    }
    
    public static function getData()
    {
        $array = array();
        
        while (count($array) < 10) {
            $post = new Post("Mahmud Al Hakim");
            $postArray = $post->toArray();
            array_push($array, $postArray);
        }
        // print_r($array);

        return $array;
    }

    public static function viewData($array)
    {
        $posts = "";

        foreach ($array as $key => $post) {
            $posts .= "<div class='post-preview'>
                        <h2 class='post-title mb-3'>$post[title]</h2>
                        <img src='$post[image]' class='img-fluid' style='width: 100%'>
                        <p class='post-meta'>Posted by $post[author] on $post[date]</p>
                        <p>$post[text]</p>
                    </div>
                    <hr>";
        }

        echo $posts;
    }
}