// Basic client-side form validation
document.getElementById("loginForm").addEventListener("submit", function(event) {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Basic validation: Check if both fields are filled
    if (!email || !password) {
        alert("Both email and password are required.");
        event.preventDefault(); // Prevent form submission
    }
});
