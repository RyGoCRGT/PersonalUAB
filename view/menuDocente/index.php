<?php
session_start();
include '../../controller/CtrMenuDocente.php';
if ($_SESSION['usuario'])
{
  if (isset($_GET['modo']))
  {
    $admin = new CtrMenuAdmin($_GET['modo']);
    $admin->Menu();
  }
  else
  {
    $admin = new CtrMenuAdmin("default");
    $admin->Menu();
  }
}
else
{
  header("Location: ../../index.php?modo=AccesDenied");
}

?>
