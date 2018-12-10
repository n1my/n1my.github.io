<?php
if (isset($_POST['submit'])) {
      $departingid = $_POST['departingid'];
      $returningid = $_POST['returningid'];
      $durationid = $_POST['durationid'];
      $hotel = $_POST['hotel'];
      $rooms = $_POST['rooms'];
      $beds = $_POST['beds'];
      $airline = $_POST['airline'];
      $passengers = $_POST['passengers'];
      
      
      // load previous XML from file
      $xml = simplexml_load_file("./data/booking.xml") or die("ERROR: Cannot load Booking.xml.");

      // add a new feedback node
      $feedback = $xml->addChild('booking');

      // add form data to XML
      $feedback->addChild('departingid', $departingid);
      $feedback->addChild('returningid', $returningid);
      $feedback->addChild('durationid', $durationid);
      $feedback->addChild('hotel', $hotel);
      $feedback->addChild('rooms', $rooms);
      $feedback->addChild('beds', $beds);
      $feedback->addChild('airline', $airline);
      $feedback->addChild('passengers', $passengers);

      // save the whole modified XML
      $xml->asXml('./data/booking.xml');
      
      // Display thank you
      header("Location: ../accepted.html");
  
} else {
      // nothing happened --go back to feedback form
      header("Location: ../index.html");
}
?>