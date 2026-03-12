<?php
/**
 * Template Name: Front Page
 * The front page template file
 *
 * @package Zett-at
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section zellige-pattern" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-morocco.jpg');">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Zett-at</h1>
            <p><?php _e('Discover more, travel smart', 'zett-at'); ?></p>
            <div class="hero-cta">
                <a href="#download" class="btn btn-primary"><?php _e('Download App', 'zett-at'); ?></a>
                <a href="#features" class="btn btn-secondary" style="border-color: #fff; color: #fff; margin-left: 1rem;"><?php _e('Learn More', 'zett-at'); ?></a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section zellige-pattern">
        <div class="container">
            <div class="section-header text-center">
                <h2><?php _e('Why Choose Zett-at?', 'zett-at'); ?></h2>
                <p><?php _e('Experience Morocco like never before with our AI-powered features', 'zett-at'); ?></p>
            </div>
            
            <div class="features-grid">
                <!-- Feature 1: AI Recognition -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"/>
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                        </svg>
                    </div>
                    <h3><?php _e('Reconnaissance IA', 'zett-at'); ?></h3>
                    <p><?php _e('Instantly identify monuments, artworks, and cultural landmarks with our advanced AI recognition technology.', 'zett-at'); ?></p>
                </div>

                <!-- Feature 2: Smart Audio Guide -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 1a9 9 0 0 0-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2c0-3.87 3.13-7 7-7s7 3.13 7 7v2h-4v8h3c1.66 0 3-1.34 3-3v-7a9 9 0 0 0-9-9z"/>
                        </svg>
                    </div>
                    <h3><?php _e('Audio-guide intelligent', 'zett-at'); ?></h3>
                    <p><?php _e('Immersive audio narratives in multiple languages, adapting to your location and interests in real-time.', 'zett-at'); ?></p>
                </div>

                <!-- Feature 3: Personalized Itineraries -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 7V5a2 2 0 0 1 2-2h2M17 3h2a2 2 0 0 1 2 2v2M21 17v2a2 2 0 0 1-2 2h-2M7 21H5a2 2 0 0 1-2-2v-2"/>
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 16v3M12 8V5M16 12h3M8 12H5"/>
                        </svg>
                    </div>
                    <h3><?php _e('Itinéraires personnalisés', 'zett-at'); ?></h3>
                    <p><?php _e('Custom travel routes tailored to your preferences, time constraints, and must-see destinations.', 'zett-at'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Audience Section -->
    <section class="audience-section zellige-pattern">
        <div class="container audience-content">
            <h2><?php _e('For the Modern Traveler', 'zett-at'); ?></h2>
            <p><?php _e('Join thousands of connected travelers exploring Morocco smarter', 'zett-at'); ?></p>
            
            <div class="audience-stats">
                <div class="stat-item">
                    <span class="stat-number">72%</span>
                    <span class="stat-label"><?php _e('Instagram Users', 'zett-at'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">55%</span>
                    <span class="stat-label"><?php _e('YouTube Engagement', 'zett-at'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">10K+</span>
                    <span class="stat-label"><?php _e('Happy Travelers', 'zett-at'); ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label"><?php _e('Cities Covered', 'zett-at'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="download" class="cta-section" style="padding: 6rem 0; background-color: #fff; text-align: center;">
        <div class="container">
            <h2><?php _e('Ready to Explore Morocco?', 'zett-at'); ?></h2>
            <p style="max-width: 600px; margin: 0 auto 2rem;"><?php _e('Download Zett-at today and transform your travel experience with AI-powered insights.', 'zett-at'); ?></p>
            <div>
                <a href="#" class="btn btn-primary"><?php _e('Download for iOS', 'zett-at'); ?></a>
                <a href="#" class="btn btn-primary" style="margin-left: 1rem;"><?php _e('Download for Android', 'zett-at'); ?></a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
