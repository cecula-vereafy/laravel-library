<?php 

$msg = array('1', '2', 'e');

var_dump($msg);

INSERT INTO assigned_customers(user_id, customer_email) VALUES((SELECT id FROM users WHERE username = ?), ?)
https://api.cecula.com/twofactor/complete', 'POST'