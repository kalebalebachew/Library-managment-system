<?php require 'Student_Account.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Library</title>
    <link rel="stylesheet" href="regi.css">
</head>
<body>

    <p style="color:black;text-align:center;font-size: 30px"><b>Create your Library Account</b></p>
    <form method="post" action="registration.php">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br><br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="studId">Student ID:</label>
        <input type="text" id="studId" name="studId" required><br><br>

        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other

        <br><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="14" max="80"><br><br>
        <label for="dept">Department:</label>
        <input type="text" id="dept" name="dept" required><br><br>
        <label for="year">Attending Year:</label>
        <input type="year" id="year" name="year" required><br><br>
        <label for="academy">Academic Year:</label>
        <input type="text" id="academy" name="academy" required><br><br>
        <input type="submit" name="submit" value="Sign Up">
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</body>
</html>
