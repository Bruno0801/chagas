<?php

use Illuminate\Support\Carbon;

if (!function_exists('since_date')) {
  function since_date($value)
  {
    $start_date = new \DateTime($value);
    $since_start = $start_date->diff(new \DateTime(date('Y-m-d H:i:s')));

    if ($since_start->invert) {
      if ($since_start->m) return "em $since_start->m mês(s)";
      if ($since_start->days) return "em $since_start->days dia(s)";
      if ($since_start->h) return "em $since_start->h hora(s)";
      if ($since_start->i) return "em $since_start->i minutos(s)";
      if ($since_start->s) return "em $since_start->s segundo(s)";
    } else {
      if ($since_start->days) return "á $since_start->days dia(s)";
      if ($since_start->h) return "á $since_start->h hora(s)";
      if ($since_start->i) return "á $since_start->i minutos(s)";
      if ($since_start->s) return "á $since_start->s segundo(s)";
    }


    return ($since_start->days * 24 * 60) + ($since_start->h * 60) + $since_start->i;
  }
}

if (!function_exists('date_hour')) {
  function date_hour($value)
  {
    $value = new Carbon($value);
    if ($value->format('Y-m-d') < now()->format('Y-m-d')) {
      $date = date_format($value, 'd/m');
      if ($value->format('Y') < now()->format('Y'))
        $date = $date . $value->format('/Y');
    } else
      $date = 'Hoje ' . date_format($value, 'H:i');
    return $date;
  }
}

if (!function_exists('date_complete')) {
  function date_complete($value)
  {
    $value = new Carbon($value);
    return $value->format('d/m/y H:i');
  }
}

if (!function_exists('date_normal')) {
  function date_normal($value)
  {
    $value = new Carbon($value);
    return $value->format('d/m/Y');
  }
}

if (!function_exists('period')) {
  function period($period = 'today', $start = null, $end = null)
  {
    switch ($period) {
      case 'today':
        $range = [now(), now()];
        break;
      case 'yesterday':
        $range = [now()->subDay(), now()->subDay()];
        break;
      case 'thisweek':
        $range = [now()->startOfWeek(), now()];
        break;
      case '7daysago':
        $range = [now()->subDays(7), now()];
        break;
      case 'lastweek':
        $range = [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()];
        break;
      case '14daysago':
        $range = [now()->subDays(14), now()];
        break;
      case 'thismonth':
        $range = [now()->startOfMonth(), now()];
        break;
      case '30daysago':
        $range = [now()->subDays(30), now()];
        break;
      case 'lastmonth':
        $range = [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()];
        break;
      case 'alltime':
        $range = [new Carbon('2022-04-25 00:00:00'), now()];
        break;
      case 'custom':
        $range = [new Carbon($start), new Carbon($end)];
        break;
      default:
        $range = [now(), now()];
        break;
    }
    return [$range[0]->format('Y-m-d') . ' 00:00:00', $range[1]->format('Y-m-d') . ' 23:59:59'];
  }
}
