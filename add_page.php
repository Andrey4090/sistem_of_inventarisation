<?php include './modules/header.php'; ?>
<?php include './modules/add_obj.php'; ?>
<?php 
session_start();
if (isset($_SESSION['message']) && $_SESSION['message'])
{
  echo $_SESSION['message_stats'], $_SESSION['message'],'</p>';
  unset($_SESSION['message']);
  unset($_SESSION['message_stats']);
}?>
<form  class="form_db" method="POST" action="./modules/file_upload.php" enctype="multipart/form-data">
    <div>
      <span>Загрузить файл:</span>
      <input type="file" name="uploadedFile" required/>
    </div>
    <button type="submit" name="uploadBtn" value="Upload">Загрузить файл</button>
  </form>  
<?php include './modules/footer.php'; ?>