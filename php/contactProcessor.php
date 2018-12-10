<?php
if (isset($_POST['submit'])) {
      $nameid = $_POST['nameid'];
      $emailid = $_POST['emailid'];
      $enquiryid = $_POST['enquiryid'];
      
      
      // load previous XML from file
      $xml = simplexml_load_file("./data/contactForm.xml") or die("ERROR: Cannot load Contactform.xml.");

      // add a new feedback node
      $feedback = $xml->addChild('enquiry');

      // add form data to XML
      $feedback->addChild('nameid', $nameid);
      $feedback->addChild('emailid', $emailid);
      $feedback->addChild('enquiryid', $enquiryid);
      

      // save the whole modified XML
      $xml->asXml('./data/contactForm.xml');
      
      // Display thank you
      header("Location: ../thankcontact.html");
  
} else {
      // nothing happened --go back to feedback form
      header("Location: ../index.html");
}
?>