<?php

/*задание с модальным окном js*/


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
            $gallery .= "<div class = 'imageWrapper'><a href = '#'><img src =" . getMiniImagePath()[$i] . " alt ="
                . getImageName()[$i] . " height = '200' width = '350' data =" . getLargeImagePath()[$i]
                . " ></a></div>";
        }
    }

    $html = file_get_contents('gallery.html');
    $html = str_replace('placeholder', $gallery, $html);
    return $html;
}


// здесь начинается JS
$jsCode = <<<js
window.onload = () => {
  console.log('Hello');
   
  let galleryWrapper = document.getElementById('galleryWrapper');
  galleryWrapper.addEventListener('click', e => {
    if (e.target.tagName === 'IMG') {
      
      let body = document.getElementsByTagName('BODY');
      let modalWindow = document.createElement('DIV');
      body[0].appendChild(modalWindow);
      modalWindow.className = 'modalWindow';
      modalWindow.setAttribute('id', 'modalW');
  
      let imageInModalWindow = document.createElement('IMG');
      modalWindow.appendChild(imageInModalWindow);
      imageInModalWindow.setAttribute('id', 'imgModal');
      let imgModal = document.getElementById('imgModal');
      imgModal.setAttribute('width', '500px');
      imgModal.setAttribute('height', '300px');
      
      imgModal.src = e.target.getAttribute('data');
    }    
  })
}

js;


$html = str_replace('placeForJsCode', $jsCode, createGalleryStructure());

echo $html;


/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 04.12.2018
 * Time: 9:38
 */