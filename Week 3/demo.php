<?php

/**
 * Jami Schwarzwalder
 * 7/9/16
 *
 * Display and add address.
 */

require 'class.Address.inc';

echo '<h2>Making new Address</h2>';
$address = new Address;

//Display empty address
echo '<h2>Empty Address</h2>';
echo '<tt><pre>' . var_export($address, TRUE) . '</pre></tt>';


//Asigning values then displaying
echo '<h2>Setting properties...</h2>';
$address->street_address_1 = '555 Main Street';
$address->city_name = 'Our Town';
$address->subdivision_name = 'IN';
$address->postal_code = '46143';
$address->country_name = 'United States';
echo '<tt><pre>' . var_export($address, TRUE) . '</pre></tt>';

echo '<h2>Displaying address...</h2>';
echo $address->display();

//Testing Protected field. This should fail
echo '<h2>Testing protected access.</h2>';
echo "Address ID: {$address->_address_id}";

//Week 3
echo '<h2>Displaying address...</h2>';
echo $address->display();

echo '<h2>Testing magic __get and __set</h2>';
unset($address->postal_code);
echo $address->display();

echo '<h2>Testing Address __construct with an array</h2>';
$address_2 = new Address(array(
  'street_address_1' => '123 Phony Ave',
  'city_name' => 'Villageland',
  'subdivision_name' => 'Region',
  'postal_code' => '67890',
  'country_name' => 'Canada',
));
echo $address_2->display(); 