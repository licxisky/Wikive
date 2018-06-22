<?php
/**
 * Created by PhpStorm.
 * User: LiCxi
 * Date: 2018/6/22
 * Time: 21:55
 */

function startWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}