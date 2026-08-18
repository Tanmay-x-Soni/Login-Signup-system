<?php

declare(strict_types=1);

function dashboard_render_profile_card(array $dashboardData): void
{
    ?>
    <main class="nebula-dashboard">
        <div class="star-field" aria-hidden="true"></div>
        <div class="orb orb-one" aria-hidden="true"></div>
        <div class="orb orb-two" aria-hidden="true"></div>

        <aside class="dashboard-sidebar">
            <a class="brand" href="dashboard.php" aria-label="Dashboard home">
                <span class="brand-mark">N</span>
                <span>NEBULA</span>
            </a>

            <nav class="dashboard-nav" aria-label="Dashboard navigation">
                <a class="nav-link active" href="dashboard.php"><span>◈</span> Overview</a>
                <a class="nav-link" href="#personal-information"><span>◎</span> Identity</a>
                <a class="nav-link" href="#account-information"><span>◌</span> Account</a>
                <a class="nav-link" href="completeProfile.php"><span>✦</span> Edit profile</a>
            </nav>

            <div class="sidebar-status">
                <span class="status-dot"></span>
                <div><small>System status</small><strong>Online</strong></div>
            </div>
        </aside>

        <section class="dashboard-content">
            <header class="dashboard-header">
                <div>
                    <p class="eyebrow">Personal command centre</p>
                    <h1>Welcome back, <span><?= htmlspecialchars($dashboardData['FULL_NAME'] ?? 'Explorer') ?></span></h1>
                </div>
                <a href="completeProfile.php" class="header-action"><span>✎</span> Edit profile</a>
            </header>

            <section class="profile-card">
                <div class="profile-scanline" aria-hidden="true"></div>
                <div class="profile-top">
                    <div class="profile-picture-wrapper">
                        <div class="profile-picture"><span>✦</span></div>
                        <span class="profile-online" aria-label="Online"></span>
                    </div>

                    <div class="profile-heading">
                        <p class="eyebrow">Verified profile</p>
                        <h2><?= htmlspecialchars($dashboardData['FULL_NAME'] ?? 'Your Name') ?></h2>
                        <p class="username">@<?= htmlspecialchars($dashboardData['USERNAME'] ?? 'username') ?></p>
                        <p class="profile-status"><span class="pulse-dot"></span> Profile signal active</p>
                    </div>

                    <div class="profile-actions">
                        <a href="completeProfile.php" class="edit-profile-btn">Update profile <span>→</span></a>
                    </div>
                </div>

                <div class="profile-section about-section">
                    <div class="section-title"><span class="section-icon">✧</span><h3>About me</h3></div>
                    <p class="bio"><?= htmlspecialchars(!empty($dashboardData['BIO']) ? $dashboardData['BIO'] : 'No bio added yet. Tell your story and make this space your own.') ?></p>
                </div>

                <div class="data-panels">
                    <section class="profile-section" id="personal-information">
                        <div class="section-title"><span class="section-icon">◈</span><h3>Personal information</h3></div>
                        <div class="details-grid">
                            <article class="detail-box">
                                <span class="detail-icon">◉</span>
                                <div>
                                    <span class="detail-label">Full name</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['FULL_NAME'] ?? 'Not provided') ?></span>
                                </div>
                            </article>

                            <article class="detail-box">
                                <span class="detail-icon">⌁</span>
                                <div>
                                    <span class="detail-label">Phone</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['PHONE'] ?? 'Not provided') ?></span>
                                </div>
                            </article>

                            <article class="detail-box">
                                <span class="detail-icon">◇</span>
                                <div>
                                    <span class="detail-label">Gender</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['GENDER'] ?? 'Not provided') ?></span>
                                </div>
                            </article>

                            <article class="detail-box">
                                <span class="detail-icon">◷</span>
                                <div>
                                    <span class="detail-label">Date of birth</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['DOB'] ?? 'Not provided') ?></span>
                                </div>
                            </article>

                            <article class="detail-box">
                                <span class="detail-icon">⌖</span>
                                <div>
                                    <span class="detail-label">Country</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['COUNTRY'] ?? 'Not provided') ?></span>
                                </div>
                            </article>
                        </div>
                    </section>

                    <section class="profile-section" id="account-information">
                        <div class="section-title"><span class="section-icon">◎</span><h3>Account information</h3></div>
                        <div class="details-grid account-grid">
                            <article class="detail-box">
                                <span class="detail-icon">@</span>
                                <div>
                                    <span class="detail-label">Username</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['USERNAME'] ?? 'Not available') ?></span>
                                </div>
                            </article>

                            <article class="detail-box">
                                <span class="detail-icon">✉</span>
                                <div>
                                    <span class="detail-label">Email</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['EMAIL'] ?? 'Not available') ?></span>
                                </div>
                            </article>

                            <article class="detail-box">
                                <span class="detail-icon">✦</span>
                                <div>
                                    <span class="detail-label">Member since</span>
                                    <span class="detail-value"><?= htmlspecialchars($dashboardData['CREATED_AT'] ?? 'Not available') ?></span>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>

                <footer class="profile-footer"><span><i></i> Your profile information is securely synced</span><a href="completeProfile.php" class="footer-edit-link">Open profile editor →</a></footer>
            </section>
        </section>
    </main>
    <?php
}
