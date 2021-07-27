<?php

if (!function_exists('tags_to_string')) {
    function tags_to_string($tags)
    {
        return isset($tags) ? $tags->pluck('name')->implode(', ') : null;
    }
}
