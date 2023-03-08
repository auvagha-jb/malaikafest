<?php
  
function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

use Carbon\Carbon;
function formatDate($date)
{
    $changedDate = Carbon::parse($date)->format('d/m/Y');
    return $changedDate;
}

function getNoOfStars($rating)
{
  $stars = 0;
  if ($rating == 1 || $rating == 2)
  {
    $stars = 1;
  }
  else if ($rating == 3 || $rating == 4)
  {
    $stars = 2;
  }
  else if ($rating == 5 || $rating == 6)
  {
    $stars = 3;
  }
  else if ($rating == 7 || $rating == 8)
  {
    $stars = 4;
  }
  else if ($rating == 9 || $rating == 10)
  {
    $stars = 5;
  }

  return $stars;
}
