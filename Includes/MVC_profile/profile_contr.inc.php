<?php 

declare(strict_types=1);

function normalize_gender(string $gender): string {
    $gender = strtolower(trim($gender));
    $map = [
        'male' => 'Male',
        'female' => 'Female',
        'other' => 'Other'
    ];

    return $map[$gender] ?? ucfirst($gender);
}

function normalize_country(string $country): string {
    $country = trim($country);
    $countryKey = strtolower($country);
    $map = [
        'india' => 'India',
        'usa' => 'United States',
        'united states' => 'United States',
        'united kingdom' => 'United Kingdom',
        'uk' => 'United Kingdom',
        'canada' => 'Canada',
        'australia' => 'Australia',
        'germany' => 'Germany',
        'france' => 'France',
        'china' => 'China',
        'japan' => 'Japan',
        'brazil' => 'Brazil',
        'other' => 'Other'
    ];

    return $map[$countryKey] ?? $country;
}

function is_fullname_empty(string $fullName): bool {
    return trim($fullName) === '';
}

function fullname_has_number(string $fullName): bool {
    return preg_match('/\d/', $fullName) === 1;
}

function fullname_has_special_character(string $fullName): bool {
    return preg_match('/[^a-zA-Z\s]/', $fullName) === 1;
}

function is_fullname_invalid(string $fullName): bool {
    if (is_fullname_empty($fullName)) {
        return true;
    }

    // Full name is valid only when it contains letters and spaces
    return !preg_match('/^[a-zA-Z\s]+$/', $fullName);
}


//first call comes to this function
function get_fullname_error(string $fullName): ?string {
    if (is_fullname_empty($fullName)) {
        return 'Full name is required.';
    }

    if (fullname_has_number($fullName)) {
        return 'Full name must not contain numbers.';
    }

    if (fullname_has_special_character($fullName)) {
        return 'Full name must not contain special characters.';
    }

    return null;
}

function is_phone_invalid(string $phoneNumber): bool {
    $phoneNumber = trim($phoneNumber);

    if ($phoneNumber === '') {
        return false;
    }

    return preg_match('/^[0-9]{10}$/', $phoneNumber) !== 1;
}

function get_phone_error(string $phoneNumber): ?string {
    $phoneNumber = trim($phoneNumber);

    if ($phoneNumber === '') {
        return null;
    }

    if (preg_match('/[^0-9]/', $phoneNumber)) {
        return 'Phone number must contain only digits.';
    }

    if (strlen($phoneNumber) !== 10) {
        return 'Phone number must be exactly 10 digits.';
    }

    return null;
}

function is_gender_invalid(string $gender): bool {
    $gender = trim($gender);
    if ($gender === '') {
        return false;
    }

    $allowedGenders = ['male', 'female', 'other'];
    return !in_array(strtolower($gender), $allowedGenders, true);
}

function get_gender_error(string $gender): ?string {
    $gender = trim($gender);
    if ($gender === '') {
        return null;
    }

    if (is_gender_invalid($gender)) {
        return 'Select a valid gender option.';
    }

    return null;
}

function is_dob_invalid(string $DOB): bool {
    $DOB = trim($DOB);
    if ($DOB === '') {
        return false;
    }

    $date = DateTime::createFromFormat('Y-m-d', $DOB);
    return !($date && $date->format('Y-m-d') === $DOB && $date <= new DateTime('today'));
}

function get_dob_error(string $DOB): ?string {
    $DOB = trim($DOB);
    if ($DOB === '') {
        return null;
    }

    if (is_dob_invalid($DOB)) {
        return 'Date of birth must be a valid date in the past (YYYY-MM-DD).';
    }

    return null;
}

function is_country_invalid(string $country): bool {
    $country = trim($country);
    if ($country === '') {
        return false;
    }

    $allowedCountries = [
        'india',
        'usa',
        'united states',
        'united kingdom',
        'uk',
        'canada',
        'australia',
        'germany',
        'france',
        'china',
        'japan',
        'brazil',
        'other'
    ];

    return !in_array(strtolower($country), $allowedCountries, true);
}

function get_country_error(string $country): ?string {
    if (trim($country) === '') {
        return null;
    }

    if (is_country_invalid($country)) {
        return 'Select a valid country option.';
    }

    return null;
}

function is_bio_invalid(string $bio): bool {
    $bio = trim($bio);
    if ($bio === '') {
        return false;
    }

    return strlen($bio) > 500;
}

function get_bio_error(string $bio): ?string {
    $bio = trim($bio);
    if ($bio === '') {
        return null;
    }

    if (is_bio_invalid($bio)) {
        return 'Bio must be 500 characters or fewer.';
    }

    return null;
}

function set_user(object $pdo , string $fullName , string $phoneNumber ,string $gender ,string $DOB , string $country ,string $bio , int $userId){
        set_profile_data($pdo , $fullName , $phoneNumber , $gender , $DOB , $country , $bio , $userId);
}
?>