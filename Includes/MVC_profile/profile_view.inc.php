<?php

declare(strict_types=1);

function get_profile_errors()
{
    if (isset($_SESSION["profile_errors"])) {
        $errors = $_SESSION["profile_errors"];
        unset($_SESSION["profile_errors"]);
        return $errors;
    }

    return [];
}

function profile_full_name_input($errors = [])
{
    $value = '';

    if (isset($_SESSION["profile_data"]["full_name"]) && !isset($errors["fullName_error"])) {
        $value = htmlspecialchars($_SESSION["profile_data"]["full_name"], ENT_QUOTES, 'UTF-8');
        echo '<input type="text" name="full_name" placeholder="Your full name" value="' . $value . '">';
    } else {
        echo '<input type="text" name="full_name" placeholder="Your full name">';
    }

    if (isset($errors["fullName_error"])) {
        echo '<p class="field-error">' . htmlspecialchars($errors["fullName_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_phone_input($errors = [])
{
    $value = '';

    if (isset($_SESSION["profile_data"]["phone_number"]) && !isset($errors["phoneNumber_error"])) {
        $value = htmlspecialchars($_SESSION["profile_data"]["phone_number"], ENT_QUOTES, 'UTF-8');
        echo '<input type="tel" name="phone_number" placeholder="Enter your number (optional)" maxlength="10" pattern="[0-9]{10}" value="' . $value . '">';
    } else {
        echo '<input type="tel" name="phone_number" placeholder="Enter your number (optional)" maxlength="10" pattern="[0-9]{10}">';
    }

    if (isset($errors["phoneNumber_error"])) {
        echo '<p class="field-error">' . htmlspecialchars($errors["phoneNumber_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_gender_input($errors = [])
{
    $selected = isset($_SESSION["profile_data"]["gender"]) ? strtolower((string) $_SESSION["profile_data"]["gender"]) : '';

    echo '<select name="gender">'
        . '<option value="" ' . ($selected === '' ? 'selected' : '') . '>Select gender</option>'
        . '<option value="Male" ' . ($selected === 'male' ? 'selected' : '') . '>Male</option>'
        . '<option value="Female" ' . ($selected === 'female' ? 'selected' : '') . '>Female</option>'
        . '<option value="Other" ' . ($selected === 'other' ? 'selected' : '') . '>Other</option>'
        . '</select>';

    if (isset($errors["gender_error"])) {
        echo '<p class="field-error">' . htmlspecialchars($errors["gender_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_dob_input($errors = [])
{
    $value = isset($_SESSION["profile_data"]["date_of_birth"]) ? htmlspecialchars($_SESSION["profile_data"]["date_of_birth"], ENT_QUOTES, 'UTF-8') : '';

    echo '<input type="date" name="date_of_birth" value="' . $value . '">';

    if (isset($errors["dob_error"])) {
        echo '<p class="field-error">' . htmlspecialchars($errors["dob_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_country_input($errors = [])
{
    $selected = isset($_SESSION["profile_data"]["country"]) ? strtolower((string) $_SESSION["profile_data"]["country"]) : '';
    $countries = ['India', 'United States', 'United Kingdom', 'Canada', 'Australia', 'Germany', 'France', 'China', 'Japan', 'Brazil', 'Other'];

    echo '<select name="country">';
    echo '<option value="" ' . ($selected === '' ? 'selected' : '') . '>Select country</option>';

    foreach ($countries as $country) {
        echo '<option value="' . $country . '" ' . ($selected === strtolower($country) ? 'selected' : '') . '>' . $country . '</option>';
    }

    echo '</select>';

    if (isset($errors["country_error"])) {
        echo '<p class="field-error">' . htmlspecialchars($errors["country_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_bio_input($errors = [])
{
    $value = isset($_SESSION["profile_data"]["bio"]) ? htmlspecialchars($_SESSION["profile_data"]["bio"], ENT_QUOTES, 'UTF-8') : '';

    echo '<textarea name="bio" rows="4" placeholder="Tell us something about yourself...">' . $value . '</textarea>';

    if (isset($errors["bio_error"])) {
        echo '<p class="field-error">' . htmlspecialchars($errors["bio_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}
