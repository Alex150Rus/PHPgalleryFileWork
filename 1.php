<?php

function getMiniImagePath()
{
    return ['image/catMini.jpg', 'image/jsMini.jpg', 'image/mailRuMini.jpg',];
}


function getLargeImagePath()
{
    return ['image/catLarge.jpg', 'image/jsLarge.jpg', 'image/MailRuLarge.jpg',];
}

function getImageName()
{
    return ['catPicture', 'jsStudyPicture', 'mailRuPicture',];

}

function createGalleryStructure()
{
    $gallery = "<div>";

    if (function_exists('getMiniImagePath') && (function_exists('getLargeImagePath')) &&
        (function_exists('getImageName'))) {

        for ($i = 0; $i < count(getMiniImagePath()); $i++) {
            $gallery .= "<a href =" . getLargeImagePath()[$i] . " target= 'target_blank'><img src ="
                . getMiniImagePath()[$i] . " alt =" .getImageName()[$i]. " height = '200' width = '350'></a>";
        }
    }

    $html = file_get_contents('gallery.html');
    $html = str_replace('placeholder', $gallery, $html);
    echo $html;
}

createGalleryStructure();


/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 04.12.2018
 * Time: 9:38
 */