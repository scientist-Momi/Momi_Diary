<?php
include_once "header.php";

if (!isset($_GET['note_id'])) {
    header("location: index.php");
} else {
    $note_id = stripslashes($_GET['note_id']);

    $sql1 = mysqli_query($conn, "select * from notesDB where note_uid = '$note_id' ");
    $sql1_array = mysqli_fetch_assoc($sql1);
}
?>

<body>
    <div class="logo">
        <img src="momi.png" alt="">
    </div>
    <div class="wrapper">
        <section class="form login">
            <div class="dash dash1">
                <a href="diary_list.php">
                    <span class="material-icons-sharp">
                        arrow_back
                    </span>
                </a>
                <p class="para para1"><?= $sql1_array['title'] ?></p>
                <span class="material-icons-sharp editBtn">
                    edit_note
                </span>
            </div>
            <small class="small_date"><?= $sql1_array['date'] ?></small>
            <div class="note_lists" id="realNote">

                <div class="note">
                    <small><?= $sql1_array['body'] ?></small>
                </div>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="updateNote">
                <div class="error-text"></div>
                <div class="success-text"></div>
                <div class="field input">
                    <label>Note Title</label>
                    <input type="text" name="noteID" hidden value="<?= $note_id ?>">
                    <input type="text" name="upTitle" value="<?= $sql1_array['title'] ?>">
                </div>
                <div class="field input">
                    <label>Note Body</label>
                    <textarea name="upBody" cols="30" rows="10"><?= $sql1_array['body'] ?></textarea>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Save Edit" id="updatenoteBtn">
                </div>
            </form>
        </section>
    </div>

    <!-- <script src="script2.js"></script> -->
    <!-- <script src="menu.js"></script> -->
    <script src="update.js"></script>
    <script src="logic/updateNote.js"></script>
</body>

</html>