// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functionality
    initNavigation();
    initHeroAnimations();
    initScrollAnimations();
    initTestimonials();
    initContactForm();
    initSmoothScrolling();
    initParallaxEffects();
    initCounterAnimations();
});

// Navigation functionality
function initNavigation() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    const menuIcon = document.getElementById('menu-icon');
    const navbar = document.getElementById('navbar');
    let isMenuOpen = false;

    // Mobile menu toggle
    mobileMenuBtn.addEventListener('click', function() {
        isMenuOpen = !isMenuOpen;

        if (isMenuOpen) {
            mobileNav.classList.add('active');
            mobileNav.style.display = 'block';
            menuIcon.className = 'fas fa-times';
            mobileMenuBtn.style.transform = 'rotate(180deg)';
        } else {
            mobileNav.classList.remove('active');
            mobileNav.style.display = 'none';
            menuIcon.className = 'fas fa-bars';
            mobileMenuBtn.style.transform = 'rotate(0deg)';
        }
    });

    // Close mobile menu when clicking on links
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            isMenuOpen = false;
            mobileNav.classList.remove('active');
            mobileNav.style.display = 'none';
            menuIcon.className = 'fas fa-bars';
            mobileMenuBtn.style.transform = 'rotate(0deg)';
        });
    });

    // Navbar scroll effect
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > 100) {
            navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        } else {
            navbar.style.background = 'rgba(255, 255, 255, 0.8)';
            navbar.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
        }

        lastScrollTop = scrollTop;
    });

    // Active nav link highlighting
    const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');
    const sections = document.querySelectorAll('section[id]');

    window.addEventListener('scroll', function() {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
}

// Hero animations
function initHeroAnimations() {
    // Animated gradient text
    const gradientText = document.querySelector('.animated-gradient');
    if (gradientText) {
        setInterval(() => {
            gradientText.style.backgroundPosition = gradientText.style.backgroundPosition === '100% 50%' ? '0% 50%' : '100% 50%';
        }, 2500);
    }

    // Tech badges staggered animation
    const techBadges = document.querySelectorAll('.tech-badge');
    techBadges.forEach((badge, index) => {
        badge.style.animationDelay = `${0.8 + index * 0.1}s`;
    });

    // Floating elements animation
    const floatingElements = document.querySelectorAll('.floating-element');
    floatingElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        element.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    });
}

// Scroll animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');

                // Special handling for different elements
                if (entry.target.classList.contains('stat-item')) {
                    animateCounter(entry.target);
                }

                if (entry.target.classList.contains('service-card')) {
                    animateServiceCard(entry.target);
                }

                if (entry.target.classList.contains('process-step')) {
                    animateProcessStep(entry.target);
                }
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animatedElements = document.querySelectorAll(`
        .stat-item,
        .service-card,
        .process-step,
        .testimonial,
        .about-content,
        .about-values,
        .contact-card,
        .footer-brand,
        .footer-column
    `);

    animatedElements.forEach(element => {
        observer.observe(element);
    });
}

// Counter animations
function initCounterAnimations() {
    function animateCounter(element) {
        const numberElement = element.querySelector('.stat-number');
        if (!numberElement || numberElement.dataset.animated) return;

        const target = parseInt(numberElement.textContent.replace(/\D/g, ''));
        const suffix = numberElement.textContent.replace(/\d/g, '');
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            numberElement.textContent = Math.floor(current) + suffix;
        }, 40);

        numberElement.dataset.animated = 'true';
    }

    // Expose function globally
    window.animateCounter = animateCounter;
}

// Service card animations
function animateServiceCard(card) {
    const features = card.querySelectorAll('.service-features li');
    features.forEach((feature, index) => {
        setTimeout(() => {
            feature.style.opacity = '1';
            feature.style.transform = 'translateX(0)';
        }, index * 100);
    });
}

// Process step animations
function animateProcessStep(step) {
    const icon = step.querySelector('.process-icon');
    const number = step.querySelector('.process-number');

    setTimeout(() => {
        if (icon) icon.style.transform = 'rotate(360deg)';
        if (number) number.style.transform = 'scale(1.2)';
    }, 200);

    setTimeout(() => {
        if (number) number.style.transform = 'scale(1)';
    }, 600);
}

// Testimonials functionality
function initTestimonials() {
    const testimonials = document.querySelectorAll('.testimonial');
    const indicators = document.querySelectorAll('.indicator');
    const playPauseBtn = document.getElementById('play-pause-btn');
    const playPauseIcon = document.getElementById('play-pause-icon');
    const carousel = document.querySelector('.testimonial-carousel');

    let currentTestimonial = 0;
    let isPlaying = true;
    let testimonialInterval;

    // Fixed height carousel - no dynamic height calculation needed
    function setCarouselHeight() {
        // Carousel height is now fixed in CSS
        return;
    }

    function showTestimonial(index) {
        // Update indicators first
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
        });

        // Fade out current testimonial
        const currentActive = carousel.querySelector('.testimonial.active');
        if (currentActive) {
            currentActive.style.opacity = '0';
            currentActive.style.transform = 'translateY(20px)';
            setTimeout(() => {
                currentActive.classList.remove('active');
            }, 300);
        }

        // Fade in new testimonial
        setTimeout(() => {
            testimonials.forEach((testimonial, i) => {
                testimonial.classList.remove('active');
                testimonial.style.opacity = '0';
                testimonial.style.transform = 'translateY(20px)';
                
                if (i === index) {
                    testimonial.classList.add('active');
                    setTimeout(() => {
                        testimonial.style.opacity = '1';
                        testimonial.style.transform = 'translateY(0)';
                    }, 50);
                }
            });
        }, 300);

        currentTestimonial = index;
    }

    function nextTestimonial() {
        const next = (currentTestimonial + 1) % testimonials.length;
        showTestimonial(next);
    }

    function startAutoPlay() {
        if (isPlaying) {
            testimonialInterval = setInterval(nextTestimonial, 5000);
        }
    }

    function stopAutoPlay() {
        clearInterval(testimonialInterval);
    }

    // Play/Pause functionality
    if (playPauseBtn) {
        playPauseBtn.addEventListener('click', function() {
            isPlaying = !isPlaying;

            if (isPlaying) {
                playPauseIcon.className = 'fas fa-pause';
                startAutoPlay();
            } else {
                playPauseIcon.className = 'fas fa-play';
                stopAutoPlay();
            }
        });
    }

    // Indicator click handlers
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            showTestimonial(index);
            stopAutoPlay();
            if (isPlaying) {
                startAutoPlay();
            }
        });
    });

    // Initialize
    showTestimonial(0);
    startAutoPlay();

    // Pause on hover
    const testimonialContainer = document.querySelector('.testimonials-container');
    if (testimonialContainer) {
        testimonialContainer.addEventListener('mouseenter', stopAutoPlay);
        testimonialContainer.addEventListener('mouseleave', () => {
            if (isPlaying) startAutoPlay();
        });
    }

    // No resize handler needed - fixed height carousel
}

// Contact form functionality
function initContactForm() {
    const contactForm = document.getElementById('contact-form');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(contactForm);
            const data = {
                name: formData.get('name'),
                email: formData.get('email'),
                subject: formData.get('subject'),
                message: formData.get('message')
            };

            // Simulate form submission
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Thank you for your message! We will get back to you soon.');
                contactForm.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;

                // Add success animation
                submitBtn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                setTimeout(() => {
                    submitBtn.style.background = 'linear-gradient(135deg, #2563eb, #8b5cf6)';
                }, 2000);
            }, 2000);
        });

        // Form validation and styling
        const inputs = contactForm.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });

            input.addEventListener('input', function() {
                if (this.checkValidity()) {
                    this.style.borderColor = '#10b981';
                } else {
                    this.style.borderColor = '#ef4444';
                }
            });
        });
    }
}

// Smooth scrolling for navigation links
function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                const offsetTop = targetSection.offsetTop - 80; // Account for fixed navbar

                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Parallax effects
function initParallaxEffects() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.hero-content');

        parallaxElements.forEach(element => {
            const speed = 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });
}

// Button hover effects
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn');

    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });

        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });

        button.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.98)';
        });

        button.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
    });
});

// Service card interactions
document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.service-card');

    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.service-icon');
            const image = this.querySelector('.service-image');

            if (icon) {
                icon.style.transform = 'rotate(360deg)';
            }
            if (image) {
                image.style.transform = 'scale(1.1)';
            }
        });

        card.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.service-icon');
            const image = this.querySelector('.service-image');

            if (icon) {
                icon.style.transform = 'rotate(0deg)';
            }
            if (image) {
                image.style.transform = 'scale(1)';
            }
        });
    });
});

// Stat icons rotation on hover
document.addEventListener('DOMContentLoaded', function() {
    const statItems = document.querySelectorAll('.stat-item');

    statItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.stat-icon');
            if (icon) {
                icon.style.transform = 'rotate(360deg)';
            }
        });

        item.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.stat-icon');
            if (icon) {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
});

// Process step hover effects
document.addEventListener('DOMContentLoaded', function() {
    const processSteps = document.querySelectorAll('.process-step');

    processSteps.forEach(step => {
        step.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.process-icon');
            const number = this.querySelector('.process-number');

            if (icon) {
                icon.style.transform = 'rotate(360deg)';
            }
            if (number) {
                number.style.transform = 'scale(1.2)';
            }
        });

        step.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.process-icon');
            const number = this.querySelector('.process-number');

            if (icon) {
                icon.style.transform = 'rotate(0deg)';
            }
            if (number) {
                number.style.transform = 'scale(1)';
            }
        });
    });
});

// Value items hover effects
document.addEventListener('DOMContentLoaded', function() {
    const valueItems = document.querySelectorAll('.value-item');

    valueItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(360deg)';
            }
        });

        item.addEventListener('mouseleave', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
});

// Contact item hover effects
document.addEventListener('DOMContentLoaded', function() {
    const contactItems = document.querySelectorAll('.contact-item');

    contactItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.contact-icon');
            if (icon) {
                icon.style.transform = 'rotate(360deg)';
            }
        });

        item.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.contact-icon');
            if (icon) {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
});

// Loading animation for page
window.addEventListener('load', function() {
    document.body.classList.add('loaded');

    // Trigger initial animations
    const heroElements = document.querySelectorAll('.hero-content > *');
    heroElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 200);
    });
});

// Keyboard navigation support
document.addEventListener('keydown', function(e) {
    // ESC key closes mobile menu
    if (e.key === 'Escape') {
        const mobileNav = document.getElementById('mobile-nav');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const menuIcon = document.getElementById('menu-icon');

        if (mobileNav.classList.contains('active')) {
            mobileNav.classList.remove('active');
            mobileNav.style.display = 'none';
            menuIcon.className = 'fas fa-bars';
            mobileMenuBtn.style.transform = 'rotate(0deg)';
        }
    }
});

// Resize handler for responsive behavior
window.addEventListener('resize', function() {
    const mobileNav = document.getElementById('mobile-nav');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const menuIcon = document.getElementById('menu-icon');

    // Close mobile menu on resize to desktop
    if (window.innerWidth > 768) {
        mobileNav.classList.remove('active');
        mobileNav.style.display = 'none';
        menuIcon.className = 'fas fa-bars';
        mobileMenuBtn.style.transform = 'rotate(0deg)';
    }
});

// Performance optimization: Throttle scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Apply throttling to scroll events
const throttledScrollHandler = throttle(function() {
    // Scroll-based animations and effects
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Update navbar background based on scroll
    const navbar = document.getElementById('navbar');
    if (scrollTop > 100) {
        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
        navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
    } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.8)';
        navbar.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
    }

    // Parallax effect for hero content
    const heroContent = document.querySelector('.hero-content');
    if (heroContent) {
        const speed = 0.5;
        const yPos = -(scrollTop * speed);
        heroContent.style.transform = `translateY(${yPos}px)`;
    }
}, 16); // ~60fps

window.addEventListener('scroll', throttledScrollHandler);

// Add CSS class for JavaScript-enabled features
document.documentElement.classList.add('js-enabled');

// Error handling for missing elements
function safeQuerySelector(selector) {
    const element = document.querySelector(selector);
    if (!element) {
        console.warn(`Element not found: ${selector}`);
    }
    return element;
}

// Utility function for adding event listeners safely
function safeAddEventListener(element, event, handler) {
    if (element) {
        element.addEventListener(event, handler);
    }
}

// Initialize tooltips (if needed)
function initTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');

    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.textContent = this.getAttribute('data-tooltip');
            document.body.appendChild(tooltip);

            const rect = this.getBoundingClientRect();
            tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + 'px';
        });

        element.addEventListener('mouseleave', function() {
            const tooltip = document.querySelector('.tooltip');
            if (tooltip) {
                tooltip.remove();
            }
        });
    });
}

// Call tooltip initialization
initTooltips();

