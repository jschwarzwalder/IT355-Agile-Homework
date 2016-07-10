<?php

/**
 * Jami Schwarzwalder
 * 7/9/16
 *
 * Display and add address.
 */

require 'class.Address.inc';

echo '<h2>Instantiating Address</h2>';
$address = new Address;

echo '<h2>Setting properties...</h2>';
$address->street_address_1 = '555 Fake Street';
$address->city_name = 'Townsville';
$address->subdivision_name = 'State';
$address->country_name = 'United States of America';
$address->address_type_id = 1;
echo $address;

echo '<h2>Testing magic __get and __set</h2>';
unset($address->postal_code);
echo $address->display();

echo '<h2>Testing Address __construct with an array</h2>';
$address_2 = new Address(array(
  'street_address_2' => '317 Park Dr.',
  'city_name' => 'Greenwood',
  'subdivision_name' => 'White River',
  'postal_code' => '46143',
  'country_name' => 'USA',
));
echo $address_2->display();

echo '<h2>Address __toString</h2>';
echo $address_2;

echo '<h2>Displaying address types...</h2>';
echo '<tt><pre>' . var_export(Address::$valid_address_types, TRUE) . '</pre></tt>';

echo '<h2>Testing address type ID validation</h2>';
for ($id = 0; $id <= 4; $id++) {
  echo "<div>$id: ";
  echo Address::isValidAddressTypeId($id) ? 'Valid' : 'Invalid';
  echo "</div>";
}