document.querySelectorAll('.col-md-6').forEach(item => {
    item.addEventListener('mouseover', () => {
        item.style.transform = 'scale(1.05)';
    });

    item.addEventListener('mouseout', () => {
        item.style.transform = 'scale(1)';
    });
});

window.onload = function() {
    var elements = document.querySelectorAll('.fade-in-image');
    var delay = 200;

    elements.forEach(function(element) {
        setTimeout(function() {
            element.style.opacity = '1';
        }, delay);
        delay += 300; // Adjust the delay (300ms) as needed for the desired sequence
    });
};