<?php include "header.php" ?>
<?php include "navbar.php" ?>

<div class="login-form">
 <form action="log.php" method="post">
   <div class="form-group">
     <input class="input-box" type="text" name="userName" placeholder="User Name">
   </div>
   <div class="form-group">
     <input class="input-box"  type="text" name="password" placeholder="Password">
   </div>
   <br><input type="submit" value="Submit" name="submit">
 </form>
</div>

<?php include "footer.php" ?>
