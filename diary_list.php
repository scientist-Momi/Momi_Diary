<?php
include_once "header.php";
?>

<body>
    <div class="logo">
        <img src="momi.png" alt="">
    </div>
    <div class="wrapper">
        <div class="menu_list">
            <div class="profile">
                <div class="p_img">
                    <img src="image/<?= $sql1_array['photo'] ?>" alt="">
                </div>
                <div class="p_name">
                    <p><?= $sql1_array['firstname'] ?> <?= $sql1_array['lastname'] ?></p>
                </div>
            </div>
            <ul>
                <a href="add_note.php">
                    <li><span class="material-icons-sharp">
                            add
                        </span>
                        Add</li>
                </a>
                <a href="diary_list.php">
                    <li><span class="material-icons-sharp">
                            view_list
                        </span>View</li>
                </a>
                <a href="logic/logout.php">
                    <li><span class="material-icons-sharp">
                            logout
                        </span>Logout</li>
                </a>
            </ul>
        </div>
        <section class="form login">
            <!-- <header>Your Personal Online Diary</header> -->
            <div class="dash">
                <span class="material-icons-sharp menuBtn">
                    menu
                </span>
                <span class="material-icons-sharp closeBtn">
                    close
                </span>
                <p class="para"><?= $sql1_array['firstname'] ?>'s online diary</p>
            </div>

            <div class="actions">
                <div class="note active" id="noteBtn1">
                    <span class="material-icons-sharp">
                        notes
                    </span>
                    <p>Note</p>
                </div>
                <div class="note" id="todo1">
                    <span class="material-icons-sharp">
                        alarm
                    </span>
                    <p>
                        To-Do/Event
                    </p>
                </div>
            </div>
            <div class="note_lists" id="noteList">
                <?php if (mysqli_num_rows($sql2) > 0) { ?>
                    <?php while ($result2 = mysqli_fetch_assoc($sql2)) : ?>
                        <?php (strlen($result2['body']) > 33) ? $msg =  substr($result2['body'], 0, 33) . '...' : $msg = $result2['body']; ?>
                        <a href="real_note.php?note_id=<?= $result2['note_uid'] ?>">
                            <div class="note">
                                <div class="note_wrap">
                                    <p><?= $result2['title'] ?></p>
                                    <div class="note_body">
                                        <div class="note_time">
                                            <small><?= $result2['date'] ?></small>
                                        </div>
                                        <small><?= $msg ?></small>
                                    </div>
                                </div>
                                <div class="todo_btn">
                                    <button data-noteid="<?= $result2['note_uid'] ?>" class="remove" name="remove">
                                        <span class="material-icons-sharp">
                                            delete
                                        </span>
                                    </button>
                                </div>

                            </div>
                        </a>
                    <?php endwhile ?>
                <?php } else { ?>
                    <div class="err_info">
                        <span class="material-icons-sharp">
                            error
                        </span>
                        <small>No note yet.</small>
                    </div>
                <?php } ?>


            </div>
            <div class="todo_lists" id="todoList">
                <?php if (mysqli_num_rows($sql3) > 0) { ?>
                    <?php while ($result3 = mysqli_fetch_assoc($sql3)) : ?>
                        <div class="todo">
                            <div class="todo_body">
                                <p class="todo_para"><?= $result3['title'] ?></p>
                                <div class="todo_date">
                                    <p><?= $result3['date'] ?></p>
                                </div>
                            </div>
                            <div class="todo_btn">
                                <button data-todoid="<?= $result3['todo_uid'] ?>" class="remove1" name="remove1">
                                    <span class="material-icons-sharp">
                                        done
                                    </span>
                                </button>
                            </div>
                        </div>
                    <?php endwhile ?>
                <?php } else { ?>
                    <div class="err_info">
                        <span class="material-icons-sharp">
                            error
                        </span>
                        <small>No event yet.</small>
                    </div>
                <?php } ?>

            </div>
        </section>
    </div>

    <script src="script2.js"></script>
    <script src="menu.js"></script>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        // preventing anchor tag
        $('.remove').on('click', function(e) {
            e.preventDefault();
        })

        // deleting note
        $('.remove').click(function() {
            delete_noteid = $(this).data("noteid");

            // alert(delete_noteid);
            $.ajax({
                url: 'logic/delete_note.php',
                type: 'post',
                data: {
                    delete_noteid: delete_noteid
                },
                dataType: 'html',
                success: function(response) {
                    location.reload(true);
                }
            });
        });

        // deleting todo
        $('.remove1').click(function() {
            delete_todoid = $(this).data("todoid");

            // alert(delete_noteid);
            $.ajax({
                url: 'logic/delete_todo.php',
                type: 'post',
                data: {
                    delete_todoid: delete_todoid
                },
                dataType: 'html',
                success: function(response) {
                    location.reload(true);
                }
            });
        });
    });
</script>