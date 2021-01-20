<?php

require_once 'php/Post.php';


class App{

    public static function main(){

       self::viewData();


    }

    public static function viewData(){

         // TEST
         $postObject = new Post("Mahmud Al Hakim");
         $postArray = $postObject->toArray();

         $template = "
            <div class='post-preview'>
                <h2 class='post-title'>
                    TITLE
                </h2>
                <div class='post-subtitle'>
                   $postArray[text]
                </div>
        
                <p class='post-meta'>Posted by $postArray[author]
                   on $postArray[date]</p>
            </div>
            <hr>";

            echo $template;

    }
}