<?php

if(isset($_SESSION['success']))
{?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?=$_SESSION["success"]?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 

    unset($_SESSION['success']);
}
if(isset($_SESSION['error']))
{?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?=$_SESSION["error"]?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
unset($_SESSION['error']);
}
?>




