<?php

declare(strict_types=1);

function dashboard_render_profile_card(array $data)
{
	$username = htmlspecialchars($data['USERNAME'] ?? $_SESSION['username'] ?? '', ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars($data['EMAIL'] ?? $_SESSION['email'] ?? '', ENT_QUOTES, 'UTF-8');
	$userid = htmlspecialchars((string)($data['ID'] ?? $_SESSION['id'] ?? 'Not Available'), ENT_QUOTES, 'UTF-8');
	$created_at = htmlspecialchars($data['CREATED_AT'] ?? $_SESSION['created_at'] ?? '', ENT_QUOTES, 'UTF-8');

	$full_name = htmlspecialchars($data['FULL_NAME'] ?? '', ENT_QUOTES, 'UTF-8');
	$phone = htmlspecialchars($data['PHONE'] ?? '', ENT_QUOTES, 'UTF-8');
	$gender = htmlspecialchars($data['GENDER'] ?? '', ENT_QUOTES, 'UTF-8');
	$dob = htmlspecialchars($data['DOB'] ?? '', ENT_QUOTES, 'UTF-8');
	$country = htmlspecialchars($data['COUNTRY'] ?? '', ENT_QUOTES, 'UTF-8');
	$bio = htmlspecialchars($data['BIO'] ?? '', ENT_QUOTES, 'UTF-8');

	echo '<div class="profile-card">';
	echo '<div class="profile-image">';
	if ($username === 'Tanmay') {
		echo '<img src="images/tanmayAvatar.png">';
	} else {
		echo '<img src="images/avatar.png">';
	}
	echo '</div>';

	echo "<h1>$username</h1>";
	echo '<p class="subtitle">Welcome Back 👋</p>';

	echo '<div class="info">';

	$boxes = [
		['Username', $username],
		['Email', $email],
		['User ID', $userid],
		['Full Name', $full_name],
		['Phone', $phone],
		['Gender', $gender],
		['Date of Birth', $dob],
		['Country', $country],
		['Bio', $bio],
		['Status', '<span class="active">Active User</span>'],
		['Account Created At', $created_at],
	];

	foreach ($boxes as [$title, $value]) {
		echo '<div class="box">';
		echo "<h3>$title</h3>";
		echo '<p>' . ($value !== '' ? $value : 'Not Available') . '</p>';
		echo '</div>';
	}

	echo '</div>'; // info
	echo '</div>'; // profile-card
}

?>
