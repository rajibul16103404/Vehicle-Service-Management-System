<!DOCTYPE html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="CSS/registration.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include ('header.php'); ?>
    <div class="registration">
        <h1>User Registration</h1>
        <form action="sendemail.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <input type="text" name="fname" placeholder="Full Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="uname" placeholder="User Name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="email" placeholder="Email" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="digit" name="phone" placeholder="Phone Number (+880)" maxlength="10" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="address" placeholder="Full Address" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Register">
                    </td>
                </tr>
                </tr>
            </table>
        </form>
    </div>
    
</body>


