<?php include "views/inc/header.php"; ?>

<div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-5">
                    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Register</h2>
                    <form action="<?php echo ROOT;?>create/user" method="post">
                        <div class="form-group">
                            <label for="my-input">Choose a username</label>
                            <input id="my-input" class="form-control" type="text" name="username" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input id="email" class="form-control" type="email" name="email" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Password Confirm</label>
                            <input id="password-confirm" class="form-control" type="password" name="password-confirm" placeholder="">
                        </div>
                        
                        <button type="submit" class="btn btn-outline-success btn-block btn-lg" name="register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button>
                    </form>
                </div>
                <div class="col-md-6 pl-5">
            
                    <h2><i class="fa fa-plus-circle" aria-hidden="true"></i> Login</h2>
                    <form action="<?php echo ROOT;?>login" method="post">
                        <div class="form-group">
                            <label for="my-input">Choose a username</label>
                            <input id="my-input" class="form-control" type="text" name="username" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" placeholder="" autocomplete="off">
                        </div>
                    
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="login"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Login</button>
       
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "views/inc/footer.php";?>