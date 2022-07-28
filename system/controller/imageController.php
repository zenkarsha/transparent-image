<?php

class imageController extends View
{
  var $model;
  function __construct ()
  {
    include './system/controller/partial/__construct.php';
  }
}
class ajax extends View
{
  function __construct()
  {
    parent::__construct();

    include './system/class/createImage.php';

    //post attribute
    @$image_w = $_POST['image_w'];
    @$image_h = $_POST['image_h'];
    @$bgcolor = $_POST['bgcolor'];
    @$color = $_POST['color'];
    @$blank_level = $_POST['blank_level'];
    @$directpost = 2;

    //create object
    $obj = new createImage();
    $obj -> Create($image_w,$image_h,$bgcolor,$color,$blank_level,$directpost);
  }
}
class generate extends View
{
  function __construct()
  {
    parent::__construct();

    include './system/class/createImage.php';

    //post attribute
    @$image_w = $_POST['image_w'];
    @$image_h = $_POST['image_h'];
    @$bgcolor = $_POST['bgcolor'];
    @$color = $_POST['color'];
    @$blank_level = $_POST['blank_level'];
    @$directpost = $_POST['directpost'];

    //create object
    $obj = new createImage();
    $obj -> Create($image_w,$image_h,$bgcolor,$color,$blank_level,$directpost);
  }
}
