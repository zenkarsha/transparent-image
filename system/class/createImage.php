<?php
class createImage
{
  function Create($image_w,$image_h,$bgcolor,$color,$blank_level,$directpost)
  {
    include_once './system/function/systemFunction.php';

    $this->width = ceil($image_w);
    $this->height = ceil($image_h);
    $this->square = ceil($blank_level);

    if($this->width > 1024) $this->width = 1024;
    if($this->height > 1024) $this->height = 1024;
    if($this->width < 1) $this->width = 1;
    if($this->height < 1) $this->height = 1;

    //create empty image
    $image = imagecreatetruecolor($this->width, $this->height);

    //colors
    $bgcolor = hex2rgb($bgcolor);
    $background = imagecolorallocate($image, $bgcolor[0], $bgcolor[1], $bgcolor[2]);
    $color = hex2rgb($color);
    $squarecolor = imagecolorallocate($image, $color[0], $color[1], $color[2]);

    //draw background
    imagefilledrectangle($image, 0, 0, $this->width, $this->height, $background);

    //draw blank squares
    $max_x = ceil($this->width/$this->square);
    $max_y = ceil($this->height/$this->square);

    for($i = 0; $i <= $max_y; $i++)
    {
      for($j = 0; $j <= $max_x; $j++)
      {
        if($i%2 !== $j%2)
          imagefilledrectangle($image, $j*$this->square, $i*$this->square, ($j+1)*$this->square - 1, ($i+1)*$this->square - 1, $squarecolor);
      }
    }

    switch ($directpost) {
      case 1:
        header('Content-Type: image/png');
        $filename=time();
        $save = "./temp/".$filename.".png";
        imagepng($image,$save,0,null);
        $url="facebookpost/?photo=".$filename;
        header("Location: $url");
        break;

      case 2:
          ob_start();
          imagepng($image,null,9,null);
          $image = ob_get_contents();
          ob_end_clean();
          @imagedestroy($image);
          print '<img src="data:image/png;base64,'.base64_encode($image).'"/>';
        break;

      default:
        header('Content-Type: image/png');
        header("Content-Transfer-Encoding: binary");
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=transparent.png');

        imagepng($image,null,9,null);
        @imagedestroy($image);
        break;
    }
  }
}
?>
