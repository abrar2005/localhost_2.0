<?php
    // GET THE FILE EXTENSION OF $file FROM THE LOOP 
    $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) == null) {
        $file_extension = strtolower(pathinfo($file, PATHINFO_FILENAME));
    }


    // LOOP THROUGH THIS FOLDER TO GET ALL THE PICS INSIDE
    $dir = new DirectoryIterator(dirname("assets/img/file_icons/*"));
    foreach ($dir as $img) {
        $img_name = pathinfo($img, PATHINFO_FILENAME);

        if ($img_name === $file_extension) {
            ?> <img src="assets/img/file_icons/<?php echo $img ?>" alt=""> <?php
        }
    }
?>