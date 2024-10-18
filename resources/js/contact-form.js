document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch('/api/store', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Форма успешно отправлена!');
                form.reset();
            } else {
                Object.entries(data.errors).forEach(([field, messages]) => {
                    const input = form.querySelector(`[name="${field}"]`);
                    if (input) {
                        input.setCustomValidity(messages.join('. '));
                        input.reportValidity();
                    }
                });
            }
        })
        .catch(error => console.error('Error:', error));
    });
});