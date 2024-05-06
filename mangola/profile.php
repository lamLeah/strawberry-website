<?php

session_start();

if (!isset($_SESSION['name']))
    header('Location: index.php');

function getUser($username, $password = null)
{

    global $pdo;

    $sql = "SELECT * FROM users WHERE LOWER(name) = LOWER('$username')";
    $sql .= $password ? "AND  password = '$password';" : ';';

    $stmt = $pdo->query($sql);
    exit($pdo);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}
function deleteUser($username)
{

    global $pdo;

    $sql = "DELETE FROM users WHERE LOWER(username) = LOWER('$username');";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute();
}

function getUserQuery($username, $password = null)
{
    $sql = "SELECT * FROM users WHERE LOWER(name) = LOWER('$username')";
    $sql .= $password ? "AND  password = '$password';" : ';';
    return $sql;
}



// include 'db/user-activity.php';
include "includes/dbconnect.php";

// Refresh Current User Data
if (isset($_SESSION['currUser']))
    $_SESSION['currUser'] = getUser($_SESSION['currUser']['username']);

$username = $_SESSION['name'];
$docTitle = "Profile - $username | ";
$user = mysqli_fetch_assoc(mysqli_query($connection, getUserQuery($username)));

if ($user) $name = $user['name'] ?? $user['username'];

$sameUser = false;
$adminView = false;
if (isset($_SESSION['currUser'])) {
    $sameUser = $_SESSION['currUser']['username'] == $user['username'];
    $adminView = $_SESSION['currUser']['is_admin'];
}

$currTime = time();
// $details = ['age', 'gender', 'email', 'location'];
$details = ['gender'];

?>

<!DOCTYPE html>
<html>
<?php include "./includes/css_header.php";
include "./includes/header_postlogin.php";
?>
<link rel="stylesheet" type="text/css" href="css/profile.css">


<body style="background-color: #EEEEEE">
    <div class="container">

        <div class="div-block-4">
            <section class="display-mode" id="displaySection" style="display: block;">
                <?php if ($user['user_profile_image']) : ?>
                    <div class="image  user-profile-img" style="background-image: url(<?php echo $user['user_profile_image'] ?>);">
                        <p class="image--preview" style="display: none;">Image Preview</p>
                    </div>
                <?php else : ?>
                    <div class="image  user-profile-img">
                        <p class="image--preview">Image Preview</p>
                    </div>

                <?php endif; ?>

                <div id="name-block" class="input-container">
                    <div class="w-row">
                        <div class="column--sidebyside w-col w-col-6">
                            <label for="First-Name" class="label--top ">User Name</label>
                            <input disabled type="text" class="input-block w-input" maxlength="256" name="name" data-name="Name" value="<?php echo $user['name'] ?>" id="fname" required="" />
                        </div>

                    </div>
                </div>
                <div id="email-block" class="input-container">
                    <label for="email" class="label--top ">Email Address</label>
                    <input disabled type="email" class="input-block w-input" maxlength="100" name="email" data-name="Email" value="<?php echo $user['email'] ?>" id="email" required="" />
                </div>
                <div id="phone-block" class="input-container w-clearfix">
                    <label class="label--top ">Phone Number</label>
                    <div class="div-block-3 w-clearfix" style="display: inline-block;">

                        <input disabled type="tel" class="input--right input-block w-input" maxlength="11" name="phone" data-name="Phone" value="<?php echo $user['phone'] ?>" id="phone" required="" />

                    </div>
                </div>
                <div class="input-container">
                    <div class="w-row">
                        <div class="column--sidebyside w-col w-col-6">
                            <label class="label--top ">Address</label>

                            <input disabled type="text" class="input-block w-input" maxlength="60" name="address" data-name="City" value="<?php echo $user['address'] ?>" id="city" />

                        </div>

                    </div>
                </div>

                <button class="submit-button w-button" id="editButton">edit</button>
            </section>
            <div class="edit-mode" id="editSection" style="display: none;">
                <div class="form-block w-form">
                    <form id="email-form" method="POST" action="update_user_profile.php" name="emailform" data-name="Email Form" class="form" enctype="multipart/form-data">
                        <input type="hidden" name="userId" value="<?php echo $user['user_id'] ?>" />
                        <?php if ($user['user_profile_image']) : ?>
                            <div class="image  user-profile-img" id="image" style="background-image: url(<?php echo $user['user_profile_image'] ?>);">
                                <p class="image--preview" id="preview-text" style="display: none;">Image Preview</p>
                            </div>
                        <?php else : ?>
                            <div class="image  user-profile-img" id="image">
                                <p class="image--preview" id="preview-text">Image Preview</p>
                            </div>
                        <?php endif; ?>

                        <div class="upload__container">
                            <div class="image--display" id="image-display"></div>
                            <label for="image" id="selector" class="label">Upload Image
                                <input type="file" name="image" id="image-file" class="image--upload" />
                            </label>
                        </div>
                        <div id="name-block" class="input-container">
                            <div class="w-row">
                                <div class="column--sidebyside w-col w-col-6">
                                    <label for="First-Name" class="label--top ">User Name</label>
                                    <input type="text" class="input-block w-input" maxlength="256" name="name" data-name="Name" value="<?php echo $user['name'] ?>" id="fname" required="" />
                                </div>

                            </div>
                        </div>
                        <div id="email-block" class="input-container">
                            <label for="email" class="label--top ">Email Address</label>

                            <?php if ($user['email']) : ?>
                                <input type="email" class="input-block w-input" maxlength="100" name="email" data-name="Email" value="<?php echo $user['email'] ?>" id="email" required="" />
                            <?php else : ?>
                                <input type="email" class="input-block w-input" maxlength="100" name="email" data-name="Email" placeholder="Ex: myname@thisemail.com" id="email" required="" />
                            <?php endif; ?>

                        </div>
                        <div id="phone-block" class="input-container w-clearfix">
                            <label class="label--top ">Phone Number</label>
                            <div class="div-block-3 w-clearfix" style="display: inline-block;">
                                <?php if ($user['phone']) : ?>
                                    <input type="tel" class="input--right input-block w-input" maxlength="11" name="phone" data-name="Phone" value="<?php echo $user['phone'] ?>" id="phone" required="" />
                                <?php else : ?>
                                    <input type="tel" class="input--right input-block w-input" maxlength="11" name="phone" data-name="Phone" placeholder="Ex: 123-456-7890" id="phone" required="" />
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="input-container">
                            <div class="w-row">
                                <div class="column--sidebyside w-col w-col-6">
                                    <label class="label--top ">Address</label>
                                    <?php if ($user['address']) : ?>
                                        <input type="text" class="input-block w-input" maxlength="60" name="address" data-name="City" value="<?php echo $user['address'] ?>" id="city" />
                                    <?php else : ?>
                                        <input type="text" class="input-block w-input" maxlength="60" name="address" data-name="City" placeholder="Ex: San Diego" id="city" />
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                        <div class="input-container">
                            <div class="div-block-5">
                                <input type="submit" value="Verify" data-wait="Please wait..." class="submit-button w-button" />
                            </div>
                        </div>
                    </form>

                </div>

            </div>

            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == 1) {
                    echo " <div class=\"w-form-done\"> <div>Update successfully!</div> </div>";
                } elseif ($_GET['msg'] == 2) {
                    echo " <div class=\"w-form-fail\"> <div>Oops! Something went wrong while updating the profile. Please try again!</div> </div>";
                }
            }
            ?>


        </div>


    </div>


    <script src="js/profileImageUpload.js" type="text/javascript"></script>
    <?php include './includes/footer.php'; ?>