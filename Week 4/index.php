<?php

/**
 * Jami Schwarzwalder
 * 7/16/16
 *
 * Display and add address.
 */

function __autoload($class_name) {
  include 'class.' . $class_name . '.inc';
}

echo '<h2>Instantiating AddressResidence</h2>';
$address_residence = new AddressResidence();

echo '<h2>Setting properties...</h2>';
$address_residence->street_address_1 = '555 Fake Street';
$address_residence->city_name = 'Townsville';
$address_residence->subdivision_name = 'State';
$address_residence->country_name = 'United States of America';
echo $address_residence;
echo '<tt><pre>' . var_export($address_residence, TRUE) . '</pre></tt>';

echo '<h2>Testing Address __construct with an array</h2>';
$address_business = new AddressBusiness(array(
  'street_address_1' => '3500 112th St',
  'city_name' => 'Tacoma',
  'subdivision_name' => 'Pierce County',
  'country_name' => 'USA',
));
echo $address_business;
echo '<tt><pre>' . var_export($address_business, TRUE) . '</pre></tt>';

echo '<h2>Instantiating AddressPark</h2>';
$address_park = new AddressPark(array(
  'street_address_1' => '317 Park Dr.',
  'city_name' => 'Greenwood',
  'subdivision_name' => 'White River',
  'country_name' => 'USA',
));
echo $address_park;
echo '<tt><pre>' . var_export($address_park, TRUE) . '</pre></tt>';

echo '<h2>Cloning AddressPark</h2>';
$address_park_clone = clone $address_park;
echo '<tt><pre>' . var_export($address_park_clone, TRUE) . '</pre></tt>';
echo '$address_park_clone is ' . ($address_park == $address_park_clone ?
  '' : 'not ') . ' a copy of $address_park.';
  
  
echo '<h2>Cloning AddressBuisiness reference</h2>';
$address_business_copy = &$address_business;
echo '$address_business_copy is ' . ($address_business === $address_business_copy ?
  '' : 'not ') . ' a copy of $address_business.';
  
echo '<h2>Setting address_business_copy as a new AddressPark</h2>';
$address_business = new AddressPark();
echo '$address_business_copy is ' . ($address_business === $address_business_copy ?
  '' : 'not ') . ' a copy of $address_business.';
echo '<br />$address_business is class ' . get_class($address_business) . '.';
echo '<br />$address_business_copy is ' . ($address_business_copy instanceof AddressBuisiness ? '' : 'not ') . 'an AddressBusiness.';



echo '<h2>Testing address type ID validation</h2>';
for ($id = 0; $id <= 4; $id++) {
  echo "<div>$id: ";
  echo Address::isValidAddressTypeId($id) ? 'Valid' : 'Invalid';
  echo "</div>";
}