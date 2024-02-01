<?php

define ('MB' , 1048576) ;  // 1024*1024 from Byte to MB 

function filterRequest ($_requestname) {
   return htmlspecialchars(strip_tags($_POST[$_requestname]));
}


function imageUpload($imageRequest)
{
  global $msgError;
  $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
  $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
  $imagesize  = $_FILES[$imageRequest]['size'];
  $allowExt   = array("jpg", "png");
  $strToArray = explode(".", $imagename);
  $ext        = end($strToArray);
  $ext        = strtolower($ext);

  if (!empty($imagename) && !in_array($ext, $allowExt)) {
    $msgError = "EXT";
  }
  if ($imagesize > 10 * MB) {
    $msgError = "size";
  }
  if (empty($msgError)) {
    move_uploaded_file($imagetmp,  "../upload/" . $imagename);
    return $imagename;
  } else {
    return "fail";
  }
}

function deleteFile($dir, $imagename)
{
  if (file_exists($dir . "/" . $imagename)) {
    unlink($dir . "/" . $imagename);
  }
}




