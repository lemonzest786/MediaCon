<?php
$title = 'Create a New Post';
require('shared/header.php');
?>
    <main>
        <?php 
        //date_default_timezone_set("America/Toronto");
        //$d = date('y-m-d h:i');
        //echo $d; ?>
        <h1>Create a New Post</h1>
        <form action="save-post.php" method="post">
            <fieldset>
                <label for="body">Body:</label>
                <textarea name="body" id="body" required maxlength="4000"></textarea>
            </fieldset>
            <fieldset>
                <label for="user">User:</label>
                <select name="user" id="user">
                    <?php
                    try {
                        // connect
                        require('shared/db.php');

                        // use SELECT to fetch the users
                        $sql = "SELECT * FROM users";

                        // run the query
                        $cmd = $db->prepare($sql);
                        $cmd->execute();
                        $users = $cmd->fetchAll();

                        // loop through the user data to create a list item for each
                        foreach ($users as $user) {
                            echo '<option>' . $user['email'] . '</option>';
                        }

                        // disconnect
                        $db = null;
                    }
                    catch (Exception $error) {
                        header('location:error.php');
                        exit();
                    }
                    ?>
                </select>
            </fieldset>
            <button class="btnOffset">Post</button>
        </form>
    </main>
<?php require('shared/footer.php'); ?>
