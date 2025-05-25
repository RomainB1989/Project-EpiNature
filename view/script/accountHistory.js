document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-details').forEach(button => {
        button.addEventListener('click', (e) => {
            const details = e.currentTarget.closest('.order-summary').querySelector('.order-details');
            const isHidden = details.style.display === 'none' || details.style.display === '';
            details.style.display = isHidden ? 'block' : 'none';
            e.currentTarget.innerHTML = isHidden ? 'Masquer ▲' : 'Détails ▼';
        });
    });
});
