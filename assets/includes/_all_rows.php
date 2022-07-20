<?php include("_byte_formatter.php"); ?>

<?php $glob = glob($main_url . "/*"); ?>

<!-- ORDERS THE FILES GOT ALPHABETICALLY BUT FOLDERS COME FIRST -->
<?php
usort($glob, function ($a, $b) {
    $aIsDir = is_dir($a);
    $bIsDir = is_dir($b);
    if ($aIsDir === $bIsDir)
        return strnatcasecmp($a, $b); // both are dirs or glob
    elseif ($aIsDir && !$bIsDir)
        return -1; // if $a is dir - it should be before $b
    elseif (!$aIsDir && $bIsDir)
        return 1; // $b is dir, should be before $a
});
?>

<?php
    $breadcrumb = str_replace("/", " > ", $main_url);
?>
<p class="breadCrumb"><?php echo str_replace(". > sites", " sites", $breadcrumb); ?></p>

<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Size</td>
            <td>Last Modified</td>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($glob as $file) {
        ?>
            <tr>
                <!-- FILE/FOLDER NAME -->
                <td>
                    <?php if (is_dir($file)) { ?>
                        <!-- FOLDER ICON FOR FOLDERS ONLY -->
                        <img src="assets\img\file_icons\folder.png" alt="<?php echo $file ?>">

                        <a href="index.php?file=<?php echo $file ?>">
                            <?php echo str_replace($main_url . "/", "", $file); ?>
                        </a>
                    <?php } else { ?>
                        <!-- FILE ICON FOR SPECIFIC FILE -->
                        <?php include("_file_sorter.php") ?>

                        <a target="blank" href="<?php echo $file ?>"><?php echo str_replace($main_url . "/", "", $file) ?></a>
                    <?php } ?>
                </td>

                <!-- FILE SIZE -->
                <td>
                    <p>
                        <?php
                        if (is_dir($file)) {
                            echo "";
                        } else {
                            // echo round(filesize($file) / 1000, 1) . "mb";
                            echo formatBytes(filesize($file));
                        }
                        ?>
                    </p>
                </td>

                <!-- FILE/FOLDER LAST MODIFIED -->
                <td>
                    <p>
                        <?php echo date("F d Y H:i:s", filemtime($file)) ?>
                    </p>
                </td>

            <?php
        }
            ?>
    </tbody>
</table>