<?php
if (isset($_POST['submit'])) {
      $departingid = $_POST['departingid'];
      $returningid = $_POST['returningid'];
      $airline = $_POST['airline'];
      $passengers = $_POST['passengers'];
      
      
      // load previous XML from file
      $xml = simplexml_load_file("./data/flight.xml") or die("ERROR: Cannot load Flight.xml.");

      // add a new feedback node
      $feedback = $xml->addChild('flight');

      // add form data to XML
      $feedback->addChild('departingid', $departingid);
      $feedback->addChild('returningid', $returningid);
      $feedback->addChild('airline', $airline);
      $feedback->addChild('passengers', $passengers);

      // save the whole modified XML
      $xml->asXml('./data/flight.xml');
      
      // Display thank you
      header("Location: ../accepted.html");
  
} else {
      // nothing happened --go back to feedback form
      header("Location: ../index.html");
}
?>