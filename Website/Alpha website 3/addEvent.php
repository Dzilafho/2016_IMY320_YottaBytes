<?php
session_start();
session_unset();
//
//// Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/google-apps/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.

$event = new Google_Service_Calendar_Event(array(
  'summary' => 'Test Event 2016',
  'location' => 'Hatfield, Pretoria',
  'description' => 'Checking to see if the script successfuly creates a new event.',
  'start' => array(
    'dateTime' => '2016-09-10T09:00:00-07:00',
    'timeZone' => 'Harare, Pretoria',
  ),
  'end' => array(
    'dateTime' => '2016-09-10T17:00:00-07:00',
    'timeZone' => 'Harare, Pretoria',
  ),
  'recurrence' => array(
    'RRULE:FREQ=DAILY;COUNT=2'
  ),
  'attendees' => array(
    array('email' => 'lpage@example.com'),
    array('email' => 'sbrin@example.com'),
  ),
  'reminders' => array(
    'useDefault' => FALSE,
    'overrides' => array(
      array('method' => 'email', 'minutes' => 24 * 60),
      array('method' => 'popup', 'minutes' => 10),
    ),
  ),
));

$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
printf('Event created: %s\n', $event->htmlLink);

?>