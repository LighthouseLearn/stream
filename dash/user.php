<?php
include_once 'header.php';
?>

<h1 class="h3 mb-2 text-gray-800" id="userTitle">User</h1>
<div id="error" style="display:none;" class="alert alert-danger"></div>
<?php if ($_SESSION["tenant"] == 'lsv_mastertenant') { ?>

    <div class="row">
        <div class="col-lg-5">
            <div class="p-5">

                <form class="user">

                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control " id="first_name" aria-describedby="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control " id="last_name" aria-describedby="last_name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control " id="email" aria-describedby="email">
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Password <span id="leftblank"></span>:</label>
                        <input type="password" class="form-control " id="password" autocomplete="new-password">
                    </div>
                    
                    <a href="javascript:void(0);" id="saveUser" class="btn btn-primary btn-user btn-block">
                        Save
                    </a>
                    <hr>

                </form>

            </div>
        </div>
    </div>
<?php } ?>
<?php
include_once 'footer.php';
