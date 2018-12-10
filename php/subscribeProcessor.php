<?php
if (isset($_POST['submit'])) {
      $emailid = $_POST['emailid'];
      
      
      
      // load previous XML from file
      $xml = simplexml_load_file("./data/subs.xml") or die("ERROR: Cannot load Subs.xml.");

      // add a new feedback node
      $feedback = $xml->addChild('subscribe');

      // add form data to XML
      $feedback->addChild('emailid', $emailid);
      
      

      // save the whole modified XML
      $xml->asXml('./data/subs.xml');
      
      // Display thank you
      header("Location: ../thanksub.html");
  
} else {
      // nothing happened --go back to feedback form
      header("Location: ../index.html");
}
?>