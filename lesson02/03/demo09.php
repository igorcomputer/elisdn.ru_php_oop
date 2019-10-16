<?php

namespace lesson02\example3\demo09;

##############################

class StaffService
{
    public function recruitEmployee($firstName, $lastName, $phoneCode, $phoneNumber, $addressCountry, $addressRegion, $addressCity, $addressStreet, $addressHouse)
    {
        // ...
    }
}

##############################

$service = new StaffService();

$service->recruitEmployee('Вася', 'Пупкин', 7, '9200000000', 'Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 1);

