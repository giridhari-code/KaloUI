
    document.querySelectorAll('.skeleton-shimmer').forEach((el) => {
        gsap.to(el, {
            backgroundPosition: '200% 0',
            ease: 'none',
            repeat: -1,
            duration: 2
        });
    });

