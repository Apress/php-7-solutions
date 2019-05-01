<?php
$person = [
    'first name' => 'David',
    'last name' => 'Powers',
    'city' => 'London',
    'country' => 'the UK'];
['country' => $country, 'last name' => $surname, 'first name' => $name] = $person;
// Displays "David Powers lives in the UK."
echo "$name $surname lives in $country.";