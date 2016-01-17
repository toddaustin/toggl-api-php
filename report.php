<?php

$token = 'Your API Key';
header('Content-type: application/json');

function get_data($url, $token, $timeout = 5) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_USERPWD, $token.':api_token');
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$returnedData = get_data("https://toggl.com/reports/api/v2/weekly?&workspace_id=[Your Workspace ID]&user_agent=[Your User Name]", $token);

$myObject = json_decode($returnedData, true);
var_dump($myObject[data][0]);
?>
