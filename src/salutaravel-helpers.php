<?php

function get_titles()
{
    return collect(config('salutaravel.titles'))->keys();
}