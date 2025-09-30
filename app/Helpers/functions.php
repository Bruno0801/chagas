<?php

use Illuminate\Support\Str;

if (!function_exists('likeUrl')) {
  function likeUrl($value)
  {
    return '%' . slug($value) . '%';
  }
}

if (!function_exists('slug')) {
  function slug($value)
  {
    return Str::slug($value);
  }
}

if (!function_exists('mask')) {
  function mask($mask, $str)
  {
    $str = preg_replace("/[^0-9]/", "", $str);

    for ($i = 0; $i < strlen($str); $i++) {
      $mask[strpos($mask, "#")] = $str[$i];
    }

    return str_replace("#", "", $mask);
  }
}

if (!function_exists('phone_format')) {
  function phone_format($value)
  {
    $value = preg_replace("/[^0-9]/", "", $value);

    if (strlen($value) == 11) {
      $phone_format = mask('(##) # ####-####', $value);
    }
    if (strlen($value) == 10) {
      $phone_format = mask('(##) ####-####', $value);
    }
    if (strlen($value) == 8) {
      $phone_format = mask('####-####', $value);
    }

    return $phone_format ?? '';
  }
}

if (!function_exists('document_format')) {
  function document_format($value)
  {
    $value = preg_replace("/[^0-9]/", "", $value);

    if (strlen($value) == 14) {
      $cpf_cnpj_formatado = mask('##.###.###/####-##', $value);
    }
    if (strlen($value) == 11) {
      $cpf_cnpj_formatado = mask('###.###.###-##', $value);
    }
    return $cpf_cnpj_formatado ?? $value;
  }
}



if (!function_exists('clear_number')) {
  function clear_number($value)
  {
    return     preg_replace("/[^0-9]/", "", $value);
  }
}
if (!function_exists('site_format')) {
  function site_format($value)
  {
    if ($value)
      return strstr($value, 'http') ? $value : 'https://' . $value;
    else
      return null;
  }
}

if (!function_exists('is_cell')) {
  function is_cell()
  {
    $iphone  = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
    $ipad    = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
    $berry   = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
    $ipod    = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
    $symbian = strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
    $acesso     = 'web';
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
      $acesso  = true;
    } else {
      $acesso  = false;
    }
    return  $acesso;
  }
}

if (!function_exists('procpalavras')) {
  function procpalavras($frase, $palavras, $resultado = 0)
  {
    foreach ($palavras as $key => $value) {
      $pos = strpos($frase, $value);
      if ($pos !== false) {
        $resultado = 1;
        break;
      }
    }
    return $resultado;
  }
}

if (!function_exists('canonical')) {
  function canonical($value)
  {
    return str_replace('/public', '', $value);
  }
}

if (!function_exists('truncate')) {
  function truncate($value, $limit = 15)
  {
    return (strlen($value) > $limit) ? substr($value, 0, $limit) . '...' : $value;
  }
}

if (!function_exists('quote_encode')) {
  function quote_encode($value)
  {
    return base64_encode($value . '^' . rand(1, 999999));
  }
}

if (!function_exists('quote_decode')) {
  function quote_decode($value)
  {
    return explode('^', base64_decode($value))[0];
    // return (strlen($value) > $limit) ? substr($value, 0, $limit) . '...' : $value;
  }
}
if (!function_exists('randon_string')) {
  function randon_string($limit = 10)
  {
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($limit / strlen($x)))), 1, $limit);
  }
}
