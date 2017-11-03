<!-- Modal -->
<div id="user_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!--Login form-->
        <form action="/login.php" method="post">
            <!-- Modal content-->
            <div class="modal-content">

                <!--Modal title and close button in header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>

                <!--Modal body with input field-->
                <div class="modal-body">
                    <a>Username:</a>
                    <input name="username" class="form-control" type="text">
                </div>

                <!--Modal footer with confirm-->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="OK">

                </div>
            </div>
        </form>

    </div>
</div>

