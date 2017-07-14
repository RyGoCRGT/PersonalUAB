<?php
session_start();
include '../../controller/CtrMenuProfesor.php';
if ($_SESSION['usuario'])
{
  if ($_SESSION['idTipoUsuario'] == 5)
  {
    if (isset($_GET['modo']))
    {
      $admin = new CtrMenuProfesor($_GET['modo']);
      $admin->Menu();
    }
    else
    {
      $admin = new CtrMenuProfesor("default");
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
