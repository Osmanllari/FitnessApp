<?php
require __DIR__ . '/vendor/autoload.php';

//comment this out 
// if (php_sapi_name() != 'cli') {
//     throw new Exception('This application must be run on the command line.');
// }

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    $client->setRedirectUri('http://localhost/WebProgCwk/WebProgramming/index.php');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';

    if (isset($_GET['code'])) {
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  
      $client->setAccessToken($token);

      if (!file_exists(dirname($tokenPath))) {
          mkdir(dirname($tokenPath), 0700, true);
      }
      file_put_contents($tokenPath, json_encode($client->getAccessToken()));
}


    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.

            // // Exchange authorization code for an access token.
            $authUrl = $client->createAuthUrl();
            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
            $authCode = $client->authenticate($_GET['code']);
            
            $accessToken = $client->getAccessToken();
            
            $client->setAccessToken($accessToken);
           
            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);


session_start();

    include('../php/loginphp/connection.php');
    include("../php/loginphp/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {  // add other php connection stuff before

    $exerciseName = $_POST['exerciseName'];
    // $exerciseDate = date("Y-n-j");
    $exerciseDate = $_POST['exerciseDate'];

    $_SESSION['scheduleName'] = $exerciseName;
    $_SESSION['scheduleDate'] = $exerciseDate;


    $event = new Google_Service_Calendar_Event(array(
        'summary' => $exerciseName ,
        // 'description' => '',
        'start' => array(
          'date' => $exerciseDate
        ),
        'end' => array(
          'date' => $exerciseDate
        ),
        'recurrence' => array(
          'RRULE:FREQ=DAILY;COUNT=1'
        ),
        'reminders' => array(
          'useDefault' => FALSE,
          'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60), //send an email reminder
            array('method' => 'popup', 'minutes' => 10), //send a popup reminder
          ),
        ),
      ));
      
      include_once("../php/addToSchedule.php");
      $calendarId = 'primary';
      $event = $service->events->insert($calendarId, $event);
      // printf('Event created: %s\n', $event->htmlLink); 
      header('Location: ../searchEngine.php'); //redirect to select another workout
     

    }

?>