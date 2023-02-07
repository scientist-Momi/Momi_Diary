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
                    <img src="image/<?= $sql1_array['photo'] ?>">
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
                <p class="para">Add a note in your diary</p>
            </div>
            <div class="actions">
                <div class="note active" id="noteBtn">
                    <span class="material-icons-sharp">
                        edit_note
                    </span>
                    <p>Note</p>
                </div>
                <div class="note" id="todo">
                    <span class="material-icons-sharp">
                        alarm_add
                    </span>
                    <p>To-Do/Event</p>
                </div>
            </div>
            <!-- NOTE -->
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="noteForm">
                <div class="error-text"></div>
                <div class="success-text"></div>
                <div class="field input">
                    <label>Note Title</label>
                    <input type="text" name="title" placeholder="Enter title here" required>
                </div>
                <div class="field input">
                    <label>Note Body</label>
                    <textarea name="note_body" cols="30" rows="10"></textarea>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Add Note" id="addnoteBtn">
                </div>
            </form>

            <!-- TODO -->
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="todoForm">
                <div class="error-text ert"></div>
                <div class="success-text srt"></div>
                <div class="field input">
                    <label>Event Title</label>
                    <input type="text" name="eTitle" placeholder="Enter title here" required>
                </div>
                <div class="field input">
                    <label>Event Date</label>
                    <input type="date" name="eDate" required>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Save" id="addTodoBtn">
                </div>
            </form>
            <!-- <div class="link">Not yet signed up? <a href="signup.php">Signup now</a></div> -->
        </section>
    </div>

    <script src="script.js"></script>
    <script src="menu.js"></script>
    <script src="logic/addNote.js"></script>
    <script src="logic/addTodo.js"></script>
</body>

</html>