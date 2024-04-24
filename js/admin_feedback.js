function toggleFeedback(element) {
    const shortFeedback = element.querySelector('.short-feedback');
    const fullFeedback = element.querySelector('.full-feedback');

    if (shortFeedback.style.display === 'none') {
        shortFeedback.style.display = 'inline';
        fullFeedback.style.display = 'none';
    } else {
        shortFeedback.style.display = 'none';
        fullFeedback.style.display = 'inline';
    }
}