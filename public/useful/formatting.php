<?php

//nombre de caractère limit
function textCut($str)
{

    // strlen — Calcule la taille d'une chaîne
    // strpos — Cherche la position de la première occurrence dans une chaîne
    // substr — Retourne un segment de chaîne

    $desc = '';
    if (strpos($str, '<br />', 300) === false) {

        $desc = substr($str, 0, strpos($str, '.', 100));
    } else if (strpos($str, '<br />',
        200
    ) < 300) {

        $desc = substr($str, 0, strpos($str, '<br />', 50));
    } else if (strpos($str, '<br />',
        100
    ) !== false) {

        $desc = substr($str, 0, strpos($str, '<br />', 20));
    } else {

        $desc = $str;
    }

    $desc .= "<b class='text-primary'>[...]</b>";
    return $desc;


    // $desc = "";
    // if(strlen($str) > $taille/2){
    //     if(strpos($str, '<br />') < $taille){
    //         $desc = substr($str, 0, strpos($str, '<br />', ($taille/2)));
    //     } else if(strpos($str, '.', ($taille/2)) < $taille){
    //         $desc = substr($str, 0, strpos($str, '.', ($taille/2)));
    //     } else if(strpos($str, '<br />', 0) <= ($taille/2)){
    //         $desc = substr($str, 0, strpos($str, '<br />', 100));
    //     } else if(strpos($str, '.', 0) <= ($taille/2)){
    //         $desc = substr($str, 0, strpos($str, '.', 100));
    //     }
    // } else {
    //     $desc = $str;
    // }
    // $desc .= "<b class='text-primary'>[...]</b>";
    // return $desc;
}

function messageAlert($text, $type){

    $alertType = "";

    if ($type === ALERT_SUCCESS) $alertType ='success';
    if ($type === ALERT_DANGER) $alertType ='danger';
    if ($type === ALERT_INFO) $alertType ='info';

    $txt = '<div class="alert alert-'.$alertType.' m-2" role="alert">';
    $txt .= $text;
    $txt .=  '</div>';

    return $txt;

}



