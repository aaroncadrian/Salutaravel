<?php

function get_titles()
{
    return collect(config('salutaravel.titles'))->keys();
}

function get_suffixes()
{
    return collect(config('salutaravel.suffixes'));
}