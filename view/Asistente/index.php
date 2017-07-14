<?php
session_start();
include '../../controller/CtrMenuAsistente.php';
if ($_SESSION['usuario'])
{
  if ($_SESSION['idTipoUsuario'] == 2)
  {
    if (isset($_GET['modo']))
    {
      $admin = new CtrMenuAsistente($_GET['modo']);
      $admin->Menu();
    }
    else
    {
      $admin = new CtrMenuAsistente("default");
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
