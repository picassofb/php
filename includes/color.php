<?php

require_once("database.php");

class Color{

    public static function find_all_colors(){
        global $database;
        $result_set = $database->query("SELECT * FROM colors");
        return $result_set;
    }

    public static function obtain_votes($color){
        global $database;
        $result_set = $database->query("SELECT SUM(Votes) votes FROM votes WHERE Color = '" . $color . "'");
        return $result_set;
    }
}