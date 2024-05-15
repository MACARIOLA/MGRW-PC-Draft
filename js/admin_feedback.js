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
    // Remove the row from the table
    const row = button.closest('tr');
    row.remove();

    // Send an AJAX request to delete the feedback from the database
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
    // Remove the row from the table
    const row = button.closest('tr');
    row.remove();

    // Send an AJAX request to delete the feedback from the database
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
    // Here you can use AJAX to send the data to the feedback page
    $.ajax({
         url: 'feedback.html', // Change the URL to the feedback page
         type: 'POST',
         data: { reviewId: reviewId },
         success: function(response) {
             // Append the feedback data to the feedbackDisplay div on the feedback page
             $('#feedbackDisplay').append(response);
         },
         error: function(xhr, status, error) {
             // Handle error
             console.error(error);
         }
    });

    // For demonstration, let's log the reviewId to the console
    console.log("Posting data for review ID: " + reviewId);
}
