<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Home</a>
        </div>

        <div class="navbar-content">
            <p>Secured by honor system</p>
            <a id="signIn" class="navbar-link">
                <button id="login" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                    Log In
                </button>
                <button id="signup" type="button" class="btn btn-default" data-toggle="modal" data-target="#signUpModal">
                    Sign Up
                </button>
                <button id="signout" type="button" class="btn btn-default">
                Sign Out
                </button>
            </a>
       </div>
    </div>
</nav>

<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Log In</h4>
                </div>
                <div class="modal-body">
                    <label>Username
                        <input class="form-control" type="text" id="username" />
                    </label>
                    <label>Password
                        <input class="form-control" type="password" id="password" />
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="completeLogIn" type="button" class="btn btn-primary">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="modal-body">
                    <label>Username
                        <input class="form-control" type="text" id="usernameSignUp" />
                    </label>
                    <label>Password
                        <input class="form-control" type="password" id="passwordSignUp" />
                    </label>
                    <label>Retype Password
                        <input class="form-control" type="password" id="reenterPassword" />
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="completeSignUp" type="button" class="btn btn-primary">Sign Up</button>
                </div>
            </div>
        </div>
    </div>