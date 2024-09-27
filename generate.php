<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

$csv_file = 'persons.csv';
$file = fopen($csv_file, 'a');

function generateWebsiteName($faker) {
    $domainExtensions = "." . $faker->tld();
    return $domainExtensions;
}


if ($file !== false) {
    for ($i = 0; $i <= 300; $i++) {
        $UUID = $faker->uuid();
        $Title = $faker->title();
        $FirstName = $faker->firstName();
        $LastName = $faker->lastName();
        $StreetAdd = $faker->streetAddress();
        $Barangay = $faker->barangay();
        $Municipality = $faker->municipality();
        $Province = $faker->province();
        $Country = ['Philippines'];
        $PhoneNo = $faker->phoneNumber();
        $MobileNo = $faker->mobileNumber();
        $CompanyName = $faker->company();
        $CompanyWeb = $CompanyName . generateWebsiteName($faker);
        $JobTitle = $faker->jobTitle();
        $FaveColor = $faker->colorName();
        $Birthdate = $faker->date();
        $Email = $faker->email();
        $Password = $faker->password();

        $data = [$UUID, $Title, $FirstName, $LastName, $StreetAdd, $Barangay, $Municipality, $Province, $Country, $PhoneNo, $MobileNo, $CompanyName, $CompanyWeb, $JobTitle, $FaveColor, $Birthdate, $Email, $Password];

        fputcsv($file, $data);
    }

    fclose($file);
    echo "Data appended to users.csv successfully!";
} else {
    echo "Failed to open the file.";
}
?>