<?php
$src = $_FILES['photo']['tmp_name'];
$imageName = uniqid() . $_FILES['photo']['name'];
$targ = "Asset/" . $imageName;
move_uploaded_file($src, $targ);

echo $targ;
?>