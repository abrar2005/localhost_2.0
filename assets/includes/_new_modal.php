<?php

if (isset($_POST['folder_name'])) {
    $new_folder = $main_url . "/" . $_POST['folder_name'];

    if (file_exists($new_folder)) {
        echo '<p id="hideMe" style=" position: fixed; top:0; color: red;text-align: center;">Folder already exists</p>';
    } else {
        mkdir($new_folder, 0777, true);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

?>
<!-- <div class="new_modal">

</div> -->

<form method="post" action="index.php?file=<?php echo $main_url ?>" class="new_modal">
    <!-- <h5>New Folder</h5> -->
    <input type="text" name="folder_name" placeholder="Folder Name" id="">
    <button type="submit">Add</button>
</form>