<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="email"], textarea, input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            border: none;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>CV Generator Form</h2>
    <form action="cv.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="John Doe" required>
        <div id="nameError" class="error"></div>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="johndoe@example.com" required>
        <div id="emailError" class="error"></div>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="1234567890" required>
        <div id="phoneError" class="error"></div>

        <label for="address">Address:</label>
        <textarea id="address" name="address" placeholder="123 Main St, Anytown, USA" required></textarea>
        <div id="addressError" class="error"></div>

        <label for="objective">Objective:</label>
        <textarea id="objective" name="objective" placeholder="Seeking a challenging position in a reputable organization..." required></textarea>
        <div id="objectiveError" class="error"></div>

        <label for="education">Education:</label>
        <textarea id="education" name="education" placeholder="Bachelor of Science in Computer Science, Anytown University, 2016 - 2020" required></textarea>
        <div id="educationError" class="error"></div>

        <label for="experience">Experience:</label>
        <textarea id="experience" name="experience" placeholder="Software Developer at ABC Corp, 2020 - Present..." required></textarea>
        <div id="experienceError" class="error"></div>

        <label for="skills">Skills:</label>
        <textarea id="skills" name="skills" placeholder="PHP, JavaScript, HTML/CSS, MySQL" required></textarea>
        <div id="skillsError" class="error"></div>

        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*" required>
        <div id="imageError" class="error"></div>

        <input type="submit" value="Generate CV">
    </form>
</div>

<script>
    function validateForm() {
        let valid = true;

        // Clear previous error messages
        document.getElementById('nameError').innerHTML = '';
        document.getElementById('emailError').innerHTML = '';
        document.getElementById('phoneError').innerHTML = '';
        document.getElementById('addressError').innerHTML = '';
        document.getElementById('objectiveError').innerHTML = '';
        document.getElementById('educationError').innerHTML = '';
        document.getElementById('experienceError').innerHTML = '';
        document.getElementById('skillsError').innerHTML = '';
        document.getElementById('imageError').innerHTML = '';

        // Name validation
        const name = document.getElementById('name').value;
        if (name.length < 2) {
            document.getElementById('nameError').innerHTML = 'Name must be at least 2 characters long.';
            valid = false;
        }

        // Email validation
        const email = document.getElementById('email').value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById('emailError').innerHTML = 'Please enter a valid email address.';
            valid = false;
        }

        // Phone validation
        const phone = document.getElementById('phone').value;
        const phonePattern = /^[0-9]{10}$/;
        if (!phonePattern.test(phone)) {
            document.getElementById('phoneError').innerHTML = 'Please enter a valid 10-digit phone number.';
            valid = false;
        }

        // Profile image validation
        const image = document.getElementById('profile_image').value;
        if (image == '') {
            document.getElementById('imageError').innerHTML = 'Please upload a profile image.';
            valid = false;
        }

        return valid;
    }
</script>

</body>
</html>
