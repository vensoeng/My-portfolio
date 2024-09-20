<?php
function urlRequest($correntUrl){
    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($actual_link == $correntUrl){
        return true;
    }else{
        return false;
    }
}
function getBaseUrl($url) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $baseUrl = $protocol . $host;
    return $baseUrl . '/'. $url;
}

function convertToLinks($inputString,$location)
{
    $words = explode(' ', $inputString);
    $result = '';
    foreach ($words as $word) {
        $result .= '<a href="'.$location. htmlspecialchars($word) .'"><p>' . htmlspecialchars($word) . '</p></a>';
    }
    
    return $result;
}

function convertToListSql($inputString,$fiel_name)
{
    $words = explode(' ', $inputString);

    if (count($words) == 1) {
        return $fiel_name. " LIKE '%" . $words[0] . "%'";
    }

    $result = '';
    foreach ($words as $index => $word) {
        $result .= $fiel_name." LIKE '%" . $word . "%'";
        if ($index < count($words) - 1) {
            $result .= ' OR ';
        }
    }

    return $result;
}

