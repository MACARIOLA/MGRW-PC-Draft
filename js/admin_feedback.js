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

function deleteFeedback(id, button) {
    const row = button.closest('tr');
    row.remove();

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/delete_feedback.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send("id=" + id);    
}   

function postData(reviewId) {
    $.ajax({
         url: 'feedback.html', 
         type: 'POST',
         data: { reviewId: reviewId },
         success: function(response) {
             $('#feedbackDisplay').append(response);
         },
         error: function(xhr, status, error) {
             console.error(error);
         }
    });

    console.log("Posting data for review ID: " + reviewId);
}
