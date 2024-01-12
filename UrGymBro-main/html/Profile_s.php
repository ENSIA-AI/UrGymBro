<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "<div class='subtitle'>You need to have an account in order to acces the profile section</div>";
    $_SESSION['page'] = 'profile';
    header("refresh:1;url=/UrGymBro-main/html/Login_Page_webdev_s.php");
    exit();
}

if (
    !isset($_POST['username']) || !isset($_POST['oldusername']) || !isset($_POST['email']) || !isset($_POST['gender']) ||
    !isset($_POST['weight']) ||
    !isset($_POST['height'])
) {

    // header("Location: /UrGymBro-main/html/Profile.php");
} else {

    @$my_connection = new mysqli('localhost', 'root', '', 'urgymbro');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database. Please try again later.';
        exit();
    }
    $oldusername = trim($_POST['oldusername']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $oldemail = trim($_POST['oldemail']);
    if ($oldusername != $username) {
        $query2 = "SELECT User_id FROM `users` WHERE `User_id`=?";

        $nameverif = $my_connection->prepare($query2);
        $nameverif->bind_param('s', $username);
        $nameverif->execute();
        $nameverif->store_result();
        if ($nameverif->num_rows != 0) {

            $_SESSION['name'] = "username already exists";
            header("Location: /UrGymBro-main/html/Profile_s.php");
            exit();
        }
    }
    if ($oldemail != $email) {
        $query3 = "SELECT User_id FROM `users` WHERE `email`=?";
        $emailverif = $my_connection->prepare($query3);
        $emailverif->bind_param('s', $email);
        $emailverif->execute();
        $emailverif->store_result();
        if ($emailverif->num_rows != 0) {

            $_SESSION['email'] = "email already exists";
            header("Location: /UrGymBro-main/html/Profile_s.php");
            exit();
        }
    }


    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'] * 100;
    $my_connection->query('SET FOREIGN_KEY_CHECKS=0;');
    $query = "UPDATE `users` SET `User_id`=?,`gender`=?,`email`=?,`height`=?,`weight`=? WHERE `User_id`=?";
    $query2 = "UPDATE `product_savings` SET `User_id`=? WHERE `User_id`=?";

    $statement = $my_connection->prepare($query);
    $statement->bind_param('sisiis', $username, $gender, $email, $height, $weight, $oldusername);
    $statement->execute();
    $statement = $my_connection->prepare($query2);
    $statement->bind_param('ss', $username, $oldusername);
    $statement->execute();
    $my_connection->query('SET FOREIGN_KEY_CHECKS=0;');

    header("refresh:1;url=/UrGymBro-main/html/Profile_s.php");







    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }














}



if (isset($_SESSION['email'])) {
    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION['email'] . '")';
    echo '</script>';
    unset($_SESSION['email']);
}
if (isset($_SESSION['name'])) {
    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION["name"] . '")';
    echo '</script>';
    unset($_SESSION['name']);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Profile
    </title>
    <link rel="stylesheet" href="../style/PROFILE1.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script href="script.js"></script>

</head>

<body>

    <div id="sidebar">
        <div id="profile-content">
            <img src="3d-portrait-businessman_23-2150793877.avif" width="100" height="100" alt="PROFILE PICTURE">

        </div>
        <div class="sidebar_elements">
            <a href="Profile_s.php" id="sd">PROFILE</a>
            <a href="homepage_s.php" id="sd">HOME</a>
            <a href="maps.php" id="sd"> GYM LOCATIONS</a>
            <a href="products_s.php" id="sd">PRODUCTS</a>
            <a href="food.php" id="sd">FOOD</a>
            <a href="savings.php" id="sd">FOOD SAVINGS</a>
            <a href="product_savings_s.php" id="sd">PRODUCT SAVINGS</a>
            <a href="settings.php" id="sd">SETTINGS</a>
            <a href="About_Us_webdev.php" id="sd">ABOUT US</a>
            <a href="help.php" id="sd">HELP?</a>
            <a href="homepage_s.php"><img src="Logo red and gray.svg" alt="UR" width="120" height="80"> </a>
        </div>
    </div>


    <div class="minibody">

        <div id="profil">
            <h1 class="profil">WELCOME TO YOUR ZONE!</h1>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

        <script>
            var textWrapper = document.querySelector('.profil');
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

            anime.timeline({ loop: true })
                .add({
                    targets: '.profil .letter',
                    scale: [4, 1],
                    opacity: [0, 1],
                    translateZ: 0,
                    easing: "easeOutExpo",
                    duration: 950,
                    delay: (el, i) => 70 * i
                }).add({
                    targets: '.profil',
                    opacity: 0,
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 1000
                });
        </script>
        <form method="post" action="#">
            <div class="profile_all">
                <div class="profile_text">
                    <div><b>Username:</b></div>
                    <div><b>Email:</b></div>
                    <div><b>Birth Date:</b></div>
                    <div><b>Gender:</b></div>
                    <div><b>Weight(Kg):</b></div>
                    <div><b>Height(Metres):</b></div>
                    <div><b>BMI:</b></div>
                </div>

                <style>
                    .error-message {
                        color: red;
                        font-size: 14px;
                        margin-top: 5px;
                    }

                    #saveChanges,
                    #cancelChanges {
                        display: none;
                    }
                </style>
                <?php
                @$my_connection = new mysqli('localhost', 'root', '', 'urgymbro');
                if (mysqli_connect_errno()) {
                    $mydisplay = 'Error: Could not connect to database. Please try again later.';

                }
                $query = "SELECT *  FROM `users` WHERE `token`=?";
                $verif = $my_connection->prepare($query);
                $verif->bind_param('s', $_SESSION["user"]);
                $verif->execute();
                $verif->store_result();
                if ($verif->num_rows == 0 || $verif->num_rows > 1) {
                    header("refresh:1;url=/UrGymBro-main/html/homepage_s.php");
                } else if ($verif->num_rows == 1) {
                    $verif->bind_result($username, $password, $d_b, $gender, $email, $height, $weight, $token);
                    ($verif->fetch());
                }

                ?>
                <div class="profile_txt" id="profile_txt">
                    <div class="profile_inputs">
                        <div id='display_username'>
                            <?php
                            echo "<input type='text' name='username' id='username' class='edit-mode' value='" . $username . "'disabled>";
                            echo " <input type='hidden' name='oldusername' value=$username  >"; ?>
                            <span class="edit-icon" onclick="toggleEditMode('username')" onclick="toggleButtons()"
                                id="edit"><img src="icons8-edit.svg " width="20" height="20"></span>

                        </div>
                        <div id="username-error" class="error-message"></div>
                    </div>

                    <div class="profile_inputs">
                        <div id="display_email">
                            <?php echo '<input type="email" name="email" id="email" class="edit-mode" value="' . $email . '"  disabled>';
                            echo " <input type='hidden' name='oldemail' value=$email>";
                            ?><span class="edit-icon" onclick="toggleEditMode('email')" id="edit"><img
                                    src="icons8-edit.svg " width="20" height="20"></span>

                        </div>
                        <div id="email-error" class="error-message"></div>
                    </div>
                    <div class="profile_inputs">
                        <?php
                       
                        echo '<input type="text" id="BMI" class="mode" value=' . $d_b . ' disabled>'; ?>
                    </div>
                    <div class="profile_inputs">
                        <?php
                        echo '<select id="gender" name="gender"  class="edit-mode" disabled>';
                        if ($gender == 0) {
                            echo '<option value="0" selected>male</option>';
                            echo '<option value="1">female</option>';
                        } else {
                            echo '<option value="0" >male</option>';
                            echo '<option value="1" selected>female</option>';
                        }

                        echo "</select>" ?>
                        <span class="edit-icon" onclick="toggleEditMode('gender')" id="edit">
                            <img src="icons8-edit.svg " width="20" height="20">
                        </span>
                    </div>
                    <div class="profile_inputs">
                        <div id="display_weight">
                            <?php echo '<input type="text" name="weight" id="weight" class="edit-mode" value=' . $weight . '  disabled>';
                            ?><span class="edit-icon" onclick="toggleEditMode('weight')" id="edit"><img
                                    src="icons8-edit.svg " width="20" height="20"></span>

                        </div>
                        <div id="weight-error" class="error-message"></div>
                    </div>
                    <div class="profile_inputs">
                        <div id="display_height">
                            <?php
                            $height1 = $height / 100;
                            echo '<input type="text" id="height" name="height" class="edit-mode" value=' . $height1 . ' disabled>';
                            ?><span class="edit-icon" onclick="toggleEditMode('height')" id="edit"><img
                                    src="icons8-edit.svg " width="20" height="20"></span>

                        </div>
                        <div id="height-error" class="error-message"></div>
                    </div>

                    <div class="profile_inputs">
                        <?php
                        $BMI = $weight / ($height * $height);
                        echo '<input type="text" id="BMI" class="mode" value=' . $BMI . ' disabled>'; ?>
                    </div>



                </div>
                <input type="submit" id="saveChanges" value="Save">
                <button id="cancelChanges">Cancel</button>
            </div>
        </form>
        <form action="Disconnect_s.php" method='post'>
            <input type="submit" id="Disconnect" value="Disconnect">
        </form>
        <script>
            let originalState = {};

            function toggleEditMode(fieldId) {
                const field = document.getElementById(fieldId);
                const editIcon = field.nextElementSibling.querySelector(".edit-icon");

                // Save the original state before entering edit mode
                if (!originalState[fieldId]) {
                    originalState[fieldId] = field.value;
                }
                const editIcons = document.querySelectorAll('.edit-mode');
                field.disabled = !field.disabled;
                if (field.disabled === false) {
                    editIcons.forEach(icon => {

                        icon.disabled = false;
                    });
                }
                else {
                    editIcons.forEach(icon => {

                        icon.disabled = true;
                    });
                }

                clearErrorMessage(fieldId);


                toggleButtons();
            }

            function toggleButtons() {
                //displayErrorMessage('email', 'Invalid email address.');

                const saveChangesBtn = document.getElementById('saveChanges');
                const cancelChangesBtn = document.getElementById('cancelChanges');
                const editIcons = document.querySelectorAll('.edit-mode');

                let isEditing = false;

                // Check if any field is in edit mode
                editIcons.forEach(icon => {

                    if (icon.disabled === false) {
                        isEditing = true;
                    }
                });

                // Toggle buttons based on editing state
                saveChangesBtn.style.display = isEditing ? 'inline-block' : 'none';
                cancelChangesBtn.style.display = isEditing ? 'inline-block' : 'none';

            }

            function clearErrorMessage(fieldId) {
                const errorElement = document.getElementById(`${fieldId}-error`);
                if (errorElement) {
                    errorElement.textContent = '';
                }
            }



            function cancelChanges() {
                // Revert input values to their original state if not changed
                revertIfNotChanged('username');
                revertIfNotChanged('email');
                revertIfNotChanged('gender');
                revertIfNotChanged('weight');
                revertIfNotChanged('height');

                // Exit edit mode without saving changes
                toggleEditMode('username');
                toggleEditMode('email');
                toggleEditMode('gender');
                toggleEditMode('weight');
                toggleEditMode('height');
            }

            function revertIfNotChanged(fieldId) {
                const field = document.getElementById(fieldId);
                if (originalState[fieldId] !== undefined && field.value !== originalState[fieldId]) {
                    field.value = originalState[fieldId];
                }
            }

            function validateForm(username, email, gender, weight, height) {
                // Simple client-side validation for illustration purposes
                if (username.trim() === '') {
                    document.getElementById("username-error").innerHTML = 'Username cannot be empty.';
                    return false;
                }

                // Validate email using a regular expression
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.trim())) {
                    displayErrorMessage('email', 'Invalid email address.');
                    return false;
                }

                // Add more validation as needed

                return true;
            }

            function displayErrorMessage(fieldId, message) {
                const errorElement = document.getElementById(`${fieldId}-error`);
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.classList.add('error-message');
                }
            }

            // Add event listeners for save and cancel buttons
            const saveChangesBtn = document.getElementById('saveChanges');
            const cancelChangesBtn = document.getElementById('cancelChanges');


            cancelChangesBtn.addEventListener('click', function (params) {
                cancelChanges();
            });
        </script>




</body>



</html>