/**
 * Catalyst Digital Theme Scripts
 *
 * @package Catalyst_Digital
 */

(function() {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const mainNavigation = document.querySelector('.main-navigation');
        const body = document.body;

        if (!menuToggle || !mainNavigation) {
            return;
        }

        // Toggle menu on button click
        menuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            // Toggle aria-expanded
            this.setAttribute('aria-expanded', !isExpanded);

            // Toggle active class
            mainNavigation.classList.toggle('active');

            // Prevent body scroll when menu is open
            body.style.overflow = isExpanded ? '' : 'hidden';
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mainNavigation.contains(e.target) && !menuToggle.contains(e.target)) {
                if (mainNavigation.classList.contains('active')) {
                    mainNavigation.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    body.style.overflow = '';
                }
            }
        });

        // Close menu on window resize if viewport gets larger
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 768 && mainNavigation.classList.contains('active')) {
                    mainNavigation.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    body.style.overflow = '';
                }
            }, 250);
        });

        // Close menu when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mainNavigation.classList.contains('active')) {
                mainNavigation.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                body.style.overflow = '';
                menuToggle.focus();
            }
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');

        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                // Skip if href is just "#"
                if (href === '#' || href === '#0') {
                    e.preventDefault();
                    return;
                }

                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();

                    // Close mobile menu if open
                    const mainNavigation = document.querySelector('.main-navigation');
                    const menuToggle = document.querySelector('.menu-toggle');
                    if (mainNavigation && mainNavigation.classList.contains('active')) {
                        mainNavigation.classList.remove('active');
                        if (menuToggle) {
                            menuToggle.setAttribute('aria-expanded', 'false');
                        }
                        document.body.style.overflow = '';
                    }

                    // Smooth scroll to target
                    const headerOffset = document.querySelector('.site-header')?.offsetHeight || 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Update focus for accessibility
                    target.setAttribute('tabindex', '-1');
                    target.focus();
                }
            });
        });
    }

    /**
     * Sticky Header on Scroll
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');
        if (!header) {
            return;
        }

        let lastScrollTop = 0;
        const headerHeight = header.offsetHeight;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > headerHeight) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScrollTop = scrollTop;
        });
    }

    /**
     * Form Validation Enhancement
     */
    function initFormValidation() {
        const forms = document.querySelectorAll('.contact-form');

        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                const inputs = form.querySelectorAll('input[required], textarea[required]');
                let isValid = true;

                inputs.forEach(function(input) {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('error');

                        // Remove error class on input
                        input.addEventListener('input', function() {
                            this.classList.remove('error');
                        }, { once: true });
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
    }

    /**
     * Email Validation
     */
    function initEmailValidation() {
        const emailInputs = document.querySelectorAll('input[type="email"]');

        emailInputs.forEach(function(input) {
            // Create error message element
            const errorMsg = document.createElement('span');
            errorMsg.className = 'email-error-message';
            errorMsg.style.color = '#f44336';
            errorMsg.style.fontSize = '0.875rem';
            errorMsg.style.marginTop = '0.25rem';
            errorMsg.style.display = 'none';
            errorMsg.textContent = 'Please enter a valid email address';

            // Insert error message after input
            input.parentNode.appendChild(errorMsg);

            // Email validation regex
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Validate on blur (when user leaves field)
            input.addEventListener('blur', function() {
                const value = this.value.trim();

                if (value === '') {
                    // Don't show error for empty field (required attribute will handle that)
                    errorMsg.style.display = 'none';
                    this.style.borderColor = '';
                    return;
                }

                if (!emailRegex.test(value)) {
                    // Invalid email
                    errorMsg.style.display = 'block';
                    this.style.borderColor = '#f44336';
                } else {
                    // Valid email
                    errorMsg.style.display = 'none';
                    this.style.borderColor = '';
                }
            });

            // Validate on input (real-time)
            input.addEventListener('input', function() {
                const value = this.value.trim();

                if (value === '') {
                    errorMsg.style.display = 'none';
                    this.style.borderColor = '';
                    return;
                }

                if (!emailRegex.test(value)) {
                    // Invalid email - show error after user has typed something substantial
                    if (value.length > 3) {
                        errorMsg.style.display = 'block';
                        this.style.borderColor = '#f44336';
                    }
                } else {
                    // Valid email
                    errorMsg.style.display = 'none';
                    this.style.borderColor = '';
                }
            });

            // Clear error on focus
            input.addEventListener('focus', function() {
                if (this.value.trim() === '') {
                    errorMsg.style.display = 'none';
                    this.style.borderColor = '';
                }
            });
        });
    }

    /**
     * US Phone Number Formatting
     */
    function initPhoneFormatting() {
        const phoneInputs = document.querySelectorAll('input[type="tel"]');

        phoneInputs.forEach(function(input) {
            input.addEventListener('input', function(e) {
                // Remove all non-numeric characters
                let value = this.value.replace(/\D/g, '');

                // Limit to 10 digits
                value = value.substring(0, 10);

                // Format as (XXX) XXX-XXXX
                let formattedValue = '';

                if (value.length > 0) {
                    formattedValue = '(' + value.substring(0, 3);
                }
                if (value.length >= 4) {
                    formattedValue += ') ' + value.substring(3, 6);
                }
                if (value.length >= 7) {
                    formattedValue += '-' + value.substring(6, 10);
                }

                this.value = formattedValue;
            });

            // Prevent non-numeric characters from being entered
            input.addEventListener('keypress', function(e) {
                // Allow: backspace, delete, tab, escape, enter
                if ([46, 8, 9, 27, 13].indexOf(e.keyCode) !== -1 ||
                    // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                    (e.keyCode === 65 && e.ctrlKey === true) ||
                    (e.keyCode === 67 && e.ctrlKey === true) ||
                    (e.keyCode === 86 && e.ctrlKey === true) ||
                    (e.keyCode === 88 && e.ctrlKey === true)) {
                    return;
                }

                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

            // Handle paste event
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedText = (e.clipboardData || window.clipboardData).getData('text');
                const numericOnly = pastedText.replace(/\D/g, '').substring(0, 10);

                // Trigger input event to format
                this.value = numericOnly;
                this.dispatchEvent(new Event('input', { bubbles: true }));
            });
        });
    }

    /**
     * Add animation on scroll
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements with animation class
        const animatedElements = document.querySelectorAll('.service-card, .team-member');
        animatedElements.forEach(function(el) {
            observer.observe(el);
        });
    }

    /**
     * Initialize all functions when DOM is ready
     */
    function init() {
        initMobileMenu();
        initSmoothScroll();
        initStickyHeader();
        initFormValidation();
        initEmailValidation();
        initPhoneFormatting();

        // Only init scroll animations if IntersectionObserver is supported
        if ('IntersectionObserver' in window) {
            initScrollAnimations();
        }
    }

    // Run init when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
