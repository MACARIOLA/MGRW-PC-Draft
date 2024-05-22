<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mgwrpcdtb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve FAQs from the database
$sql = "SELECT * FROM cms_faqs";
$result = $conn->query($sql);

// Check if there are FAQs
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='faq' data-id='" . $row["id"] . "' style='background-color: var(--black2); border-radius: 10px; margin-bottom: 1rem; padding: 1.3rem; box-shadow: .5rem 2px .5rem rgba(0, 0, 0, .1); cursor: pointer;'>";
        echo "<h3 class='faq-question' style='font-size: 20px; color: var(--white1); display: flex; justify-content: space-between; align-items: center;'>" . $row["question"] . "<button class='toggle-answer' style='background: none; border: none; color: var(--white1); font-size: 24px; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; border-radius: 50%; cursor: pointer;'>+</button></h3>";
        echo "<div class='faq-answer-wrapper' style='max-height: 0; overflow: hidden; transition: max-height 0.5s ease;'><p class='faq-answer' style='font-size: 18px; color: var(--mgwrpcMain2);'>" . $row["answer"] . "</p></div>";
        echo "<button class='delete-faq hidden' style='background-color: red; color: white; border: none; padding: 5px 10px; margin-top: 10px; cursor: pointer;'>Delete</button>"; // Initially hidden
        echo "</div>";
    }
} else {
    echo "";
}

// Close the database connection
$conn->close();
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all the faq elements
    const faqs = document.querySelectorAll('.faq');

    // Loop through each faq
    faqs.forEach(faq => {
        // Add click event listener to the question
        const question = faq.querySelector('.faq-question');
        question.addEventListener('click', function() {
            // Get the corresponding answer wrapper
            const answerWrapper = this.nextElementSibling;
            const toggleButton = this.querySelector('.toggle-answer');

            // Toggle the max-height style of the answer wrapper
            if (answerWrapper.style.maxHeight === '0px' || answerWrapper.style.maxHeight === '') {
                answerWrapper.style.maxHeight = answerWrapper.scrollHeight + 'px';
                toggleButton.textContent = '-'; // Change button text to "-"
            } else {
                answerWrapper.style.maxHeight = '0px';
                toggleButton.textContent = '+'; // Change button text to "+"
            }
        });
    });

    // Add delete functionality
    const deleteButtons = document.querySelectorAll('.delete-faq');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const faqElement = this.closest('.faq');
            const faqId = faqElement.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this FAQ?')) {
                fetch('php/delete_faq.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: faqId })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Log the response for debugging
                    if (data.success) {
                        faqElement.remove();
                    } else {
                        alert('Failed to delete FAQ. ' + (data.error || ''));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to delete FAQ.');
                });
            }
        });
    });
});
</script>
