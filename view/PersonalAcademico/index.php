<?php
session_start();
include '../../controller/CtrMenuPersonalAcademico.php';
if ($_SESSION['usuario'])
{
  if ($_SESSION['idTipoUsuario'] == 3)
  {
    if (isset($_GET['modo']))
    {
      $admin = new CtrMenuPersonalAcademico($_GET['modo']);
      $admin->Menu();
    }
    else
    {
      $admin = new CtrMenuPersonalAcademico("default");
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
