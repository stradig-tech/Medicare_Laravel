<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Calendar;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function generateMeetLink(Request $request)
    {
        // Create a new Google Meet link
        $event = new \Google_Service_Calendar_Event(array(
            'summary' => 'New Meeting',
            'location' => 'Online',
            'start' => array(
                'dateTime' => '2023-02-15T09:00:00-07:00',
                'timeZone' => 'America/Los_Angeles'
            ),
            'end' => array(
                'dateTime' => '2023-02-15T10:00:00-07:00',
                'timeZone' => 'America/Los_Angeles'
            ),
            'conferenceData' => array(
                'createRequest' => array(
                    'requestId' => uniqid()
                )
            )
        ));
        $event = $service->events->insert('primary', $event, array('conferenceDataVersion' => 1));

        // Get the Google Meet link and return it as a JSON response
        $meetLink = $event->getHangoutLink();
        return response()->json(['meet_link' => $meetLink]);
    }

}


