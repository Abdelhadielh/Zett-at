/**
 * Navigation Script for Zett-at Theme
 * Handles mobile menu toggle and sticky header behavior
 *
 * @package Zett-at
 * @since 1.0.0
 */

(function() {
    'use strict';

    // DOM Elements
    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenu = document.querySelector('.main-navigation ul');
    const siteHeader = document.querySelector('.site-header');

    /**
     * Mobile Menu Toggle
     */
    if (menuToggle && primaryMenu) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            primaryMenu.classList.toggle('active');
            menuToggle.classList.toggle('active');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInside = siteHeader.contains(event.target);
            
            if (!isClickInside && primaryMenu.classList.contains('active')) {
                menuToggle.setAttribute('aria-expanded', 'false');
                primaryMenu.classList.remove('active');
                menuToggle.classList.remove('active');
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && primaryMenu.classList.contains('active')) {
                menuToggle.setAttribute('aria-expanded', 'false');
                primaryMenu.classList.remove('active');
                menuToggle.classList.remove('active');
                menuToggle.focus();
            }
        });
    }

    /**
     * Sticky Header Enhancement
     * Add shadow on scroll
     */
    if (siteHeader) {
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', function() {
            const currentScrollY = window.scrollY;

            if (currentScrollY > 100) {
                siteHeader.classList.add('scrolled');
            } else {
                siteHeader.classList.remove('scrolled');
            }

            lastScrollY = currentScrollY;
        }, { passive: true });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only handle internal anchors
            if (href !== '#' && href.length > 1) {
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    
                    const headerHeight = siteHeader ? siteHeader.offsetHeight : 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
                    
                    window.scrollTo({
                        top: targetPosition - headerHeight,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    if (primaryMenu && primaryMenu.classList.contains('active')) {
                        menuToggle.setAttribute('aria-expanded', 'false');
                        primaryMenu.classList.remove('active');
                        menuToggle.classList.remove('active');
                    }
                }
            }
        });
    });

    /**
     * Intersection Observer for Animations
     * Fade in elements as they come into view
     */
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe feature cards and stat items
        document.querySelectorAll('.feature-card, .stat-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Add visible state styles
        const style = document.createElement('style');
        style.textContent = `
            .fade-in-visible {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);
    }

    /**
     * Download Button Click Tracking
     * Optional: Add analytics tracking for download buttons
     */
    document.querySelectorAll('.download-btn, .btn-primary').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Track if it's a download link
            if (href && (href.includes('download') || href === '#download')) {
                // You can add Google Analytics or other tracking here
                console.log('Download button clicked');
                
                // Example: gtag('event', 'click', { event_category: 'CTA', event_label: 'Download App' });
            }
        });
    });

})();
