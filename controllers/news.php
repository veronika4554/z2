<?php

    class news
    {
        Public static function getNews($category){
            $all = DB::run("SELECT id, head, body FROM news WHERE category=?", array($category))->fetchAll();
            return $all;
        }

        Public static function getCategs(){
            $all = DB::run("SELECT id, name FROM categories")->fetchall();
            return $all;
        }
    }