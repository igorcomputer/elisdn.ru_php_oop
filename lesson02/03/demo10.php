<?php

namespace lesson02\example3\demo10;

##############################

class StaffService
{
    public function recruitEmployee($name, $phone, $address)
    {
        $employee = [
            'id' => rand(10000, 99999),
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
        ];
        $this->save($employee);
        return $employee;
    }

    private function save($employee)
    {
        $file = __DIR__ . '/data/employee_' . $employee['id'] . '.php';
        file_put_contents($file, '<?php return ' . var_export($employee, true) . ';');
    }
}

##############################

$service = new StaffService();

$name = [
    'first' => 'Вася',
    'last' => 'Пупкин',
];

$phone = [
    'code' => 7,
    'number' => '9200000000',
];

$address = [
    'country' => 'Россия',
    'region' => 'Липецкая обл.',
    'city' => 'г. Пушкин',
    'street' => 'ул. Ленина',
    'house' => 1,
];

$employee = $service->recruitEmployee($name, $phone, $address);

echo $employee['phone']['number'] . PHP_EOL;
