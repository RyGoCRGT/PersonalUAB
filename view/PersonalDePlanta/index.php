<?php
session_start();
include '../../controller/CtrMenuPersonalDePlanta.php';
if ($_SESSION['usuario'])
{
  if ($_SESSION['idTipoUsuario'] == 4)
  {
    if (isset($_GET['modo']))
    {
      $admin = new CtrMenuPersonalDePlanta($_GET['modo']);
      $admin->Menu();
    }
    else
    {
      $admin = new CtrMenuPersonalDePlanta("default");
      $admin->Menu();
    }
  }
  else
  {
    header("Location: ../../index.php");
  }
}
else
{
  header("Location: ../../index.php?modo=AccesDenied");
}

?>
