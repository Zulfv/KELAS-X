// Menunggu hingga DOM sepenuhnya dimuat
document.addEventListener("DOMContentLoaded", function() {
    // Menambahkan efek transisi pada produk
    const retroCards = document.querySelectorAll('.retro-card');
    retroCards.forEach((card, index) => {
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, index * 100); // Delay untuk setiap card
    });

    // Validasi form pencarian
    const searchForm = document.querySelector('form[action="products.php"]');
    searchForm.addEventListener('submit', function(event) {
        const searchInput = searchForm.querySelector('input[name="search"]');
        if (searchInput.value.trim() === '') {
            event.preventDefault(); // Mencegah pengiriman form
            alert('Silakan masukkan kata kunci pencarian.');
            searchInput.focus(); // Fokus pada input
        }
    });
});