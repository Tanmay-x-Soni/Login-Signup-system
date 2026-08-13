<?php

declare(strict_types=1);

function get_profile_errors(){
    if(isset($_SESSION["profile_errors"])){
        $errors = $_SESSION["profile_errors"];
        unset($_SESSION["profile_errors"]);
        return $errors;
    }

    return [];
}

function profile_full_name_input($errors = []){
    $value = '';

    if(isset($_SESSION["profile_data"]["full_name"]) && !isset($errors["fullName_error"])){
        $value = htmlspecialchars($_SESSION["profile_data"]["full_name"], ENT_QUOTES, 'UTF-8');
        echo '<input type="text" name="full_name" placeholder="Your Full name" value="' . $value . '">';
    } else {
        echo '<input type="text" name="full_name" placeholder="Your Full name">';
    }

    if(isset($errors["fullName_error"])){
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($errors["fullName_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_phone_input($errors = []){
    $value = '';

    if(isset($_SESSION["profile_data"]["phone_number"]) && !isset($errors["phoneNumber_error"])){
        $value = htmlspecialchars($_SESSION["profile_data"]["phone_number"], ENT_QUOTES, 'UTF-8');
        echo '<input type="tel" name="phone_number" placeholder="Enter your number (Optional)" maxlength="10" pattern="[0-9]{10}" value="' . $value . '">';
    } else {
        echo '<input type="tel" name="phone_number" placeholder="Enter your number (Optional)" maxlength="10" pattern="[0-9]{10}">';
    }

    if(isset($errors["phoneNumber_error"])){
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($errors["phoneNumber_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_gender_input($errors = []){
    $selected = '';
    if(isset($_SESSION["profile_data"]["gender"])){
        $selected = strtolower((string) $_SESSION["profile_data"]["gender"]);
    }

    echo '<select name="gender">';
    echo '<option value="" ' . ($selected === '' ? 'selected' : '') . '>Select Gender</option>';
    echo '<option value="Male" ' . ($selected === 'male' ? 'selected' : '') . '>Male</option>';
    echo '<option value="Female" ' . ($selected === 'female' ? 'selected' : '') . '>Female</option>';
    echo '<option value="Other" ' . ($selected === 'other' ? 'selected' : '') . '>Other</option>';
    echo '</select>';

    if(isset($errors["gender_error"])){
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($errors["gender_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_dob_input($errors = []){
    $value = '';

    if(isset($_SESSION["profile_data"]["date_of_birth"])){
        $value = htmlspecialchars($_SESSION["profile_data"]["date_of_birth"], ENT_QUOTES, 'UTF-8');
        echo '<input type="date" name="date_of_birth" value="' . $value . '">';
    } else {
        echo '<input type="date" name="date_of_birth">';
    }

    if(isset($errors["dob_error"])){
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($errors["dob_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_country_input($errors = []){
    $selected = '';
    if(isset($_SESSION["profile_data"]["country"])){
        $selected = strtolower((string) $_SESSION["profile_data"]["country"]);
    }

    echo '<select name="country">';
    echo '<option value="" ' . ($selected === '' ? 'selected' : '') . '>Select Country</option>';
    echo '<option value="India" ' . ($selected === 'india' ? 'selected' : '') . '>India</option>';
    echo '<option value="United States" ' . ($selected === 'united states' ? 'selected' : '') . '>United States</option>';
    echo '<option value="United Kingdom" ' . ($selected === 'united kingdom' ? 'selected' : '') . '>United Kingdom</option>';
    echo '<option value="Canada" ' . ($selected === 'canada' ? 'selected' : '') . '>Canada</option>';
    echo '<option value="Australia" ' . ($selected === 'australia' ? 'selected' : '') . '>Australia</option>';
    echo '<option value="Germany" ' . ($selected === 'germany' ? 'selected' : '') . '>Germany</option>';
    echo '<option value="France" ' . ($selected === 'france' ? 'selected' : '') . '>France</option>';
    echo '<option value="China" ' . ($selected === 'china' ? 'selected' : '') . '>China</option>';
    echo '<option value="Japan" ' . ($selected === 'japan' ? 'selected' : '') . '>Japan</option>';
    echo '<option value="Brazil" ' . ($selected === 'brazil' ? 'selected' : '') . '>Brazil</option>';
    echo '<option value="Other" ' . ($selected === 'other' ? 'selected' : '') . '>Other</option>';
    echo '</select>';

    if(isset($errors["country_error"])){
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($errors["country_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function profile_bio_input($errors = []){
    $value = '';

    if(isset($_SESSION["profile_data"]["bio"])){
        $value = htmlspecialchars($_SESSION["profile_data"]["bio"], ENT_QUOTES, 'UTF-8');
        echo '<textarea name="bio" rows="4" placeholder="Tell us something about yourself...">' . $value . '</textarea>';
    } else {
        echo '<textarea name="bio" rows="4" placeholder="Tell us something about yourself..."></textarea>';
    }

    if(isset($errors["bio_error"])){
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($errors["bio_error"], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}
