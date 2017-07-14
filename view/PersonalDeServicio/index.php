<?php
session_start();
include '../../controller/CtrMenuPersonalDeServicio.php';
if ($_SESSION['usuario'])
{
  if ($_SESSION['idTipoUsuario'] == 6)
  {
    if (isset($_GET['modo']))
    {
      $admin = new CtrMenuPersonalDeServicio($_GET['modo']);
      $admin->Menu();
    }
    else
    {
      $admin = new CtrMenuPersonalDeServicio("default");
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
