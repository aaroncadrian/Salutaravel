<?php

if(!function_exists('get_titles'))
{
    function get_titles()
    {
        return collect(config('salutaravel.titles'))->keys();
    }
}

if(!function_exists('get_suffixes'))
{
    function get_suffixes()
    {
        return collect(config('salutaravel.suffixes'));
    }
}

if(!function_exists('title_to_gender'))
{
    function title_to_gender($title)
    {
        return (new \AaronAdrian\Salutaravel\Services\TitleToGenderConverter)->handle($title);
    }
}