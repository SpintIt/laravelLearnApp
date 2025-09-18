document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    const openModalBtn = document.getElementById('open-review-modal');
    const closeModalBtn = document.getElementById('close-review-modal');
    const reviewModal = document.getElementById('review-modal');

    // Toggle mobile menu
    hamburger?.addEventListener('click', () => {
        mobileMenu?.classList.toggle('hidden');
    });

    // Open review modal
    openModalBtn?.addEventListener('click', () => {
        reviewModal?.classList.remove('hidden');
    });

    // Close review modal
    closeModalBtn?.addEventListener('click', () => {
        reviewModal?.classList.add('hidden');
    });

    // Close modal when clicking outside of it
    reviewModal?.addEventListener('click', (event) => {
        if (event.target === reviewModal) {
            reviewModal?.classList.add('hidden');
        }
    });
});
