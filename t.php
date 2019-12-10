<?php
$image = "../img/gallery/9.png";
if(is_file($image) && mime_content_type($image_type) == 'image/png'){
    echo "Image is PNG";
}else{
    echo  "Not PNG";
}
?>