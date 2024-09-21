// Select all verify buttons
const verifyButtons = document.querySelectorAll('.verifyButton');

// Function to set the button as verified
function setVerified(button) {
    button.textContent = 'Verified';
    button.classList.add('verified');
}

// Function to remove the verified state
function removeVerified(button) {
    button.textContent = 'Verify';
    button.classList.remove('verified');
}

// Function to initialize button state
function initializeButtonState(button) {
    const buttonId = button.getAttribute('data-id'); // Get unique identifier
    const isVerified = localStorage.getItem(`isVerified_${buttonId}`) === 'true'; // Check if this button is verified
    if (isVerified) {
        setVerified(button); // Set button to "Verified" if already verified
    }
}

// Event listener for button click
verifyButtons.forEach(button => {
    const buttonId = button.getAttribute('data-id'); // Get unique identifier

    button.addEventListener('click', () => {
        const isVerified = localStorage.getItem(`isVerified_${buttonId}`) === 'true';

        if (!isVerified) { // Only allow verification if not already verified
            // Ask for permission to verify
            if (confirm("Do you want to verify this button?")) {
                setVerified(button); // Set button to "Verified"
                localStorage.setItem(`isVerified_${buttonId}`, 'true'); // Save state in localStorage
            }
        } else {
            // Ask for permission to remove verified status
            if (confirm("Do you want to remove the verified status?")) {
                removeVerified(button); // Set button back to "Verify"
                localStorage.setItem(`isVerified_${buttonId}`, 'false'); // Update state in localStorage
            }
        }
    });

    // Initialize button state on page load
    initializeButtonState(button);
});