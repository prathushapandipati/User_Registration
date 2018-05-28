<?php
//mail('prathusha.pandipati@gmail.com','Testing','this is just a test to check localhost email ','From: prathusha.pandipati@gmail.com');
$emailTo="prathusha.pandipati@gmail.com";
 $subject="testing";
 $body="lets check its working or not using better variable way";
 $headers="From:prathusha.pandipati@gmail.com";
     if (mail($emailTo, $subject, $body, $headers)) {
                echo "Mail sent successfully!";
                    } else {
                                echo "Mail not sent!";
                    }
?>