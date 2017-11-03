<?php
// import database
include "database.php";

// get the companies ready
$companies = getCompanies();

// get the order if we have a user logged in (which there must be, but still)
if (isset($_SESSION["username"])) {
    $order = getOrder($_SESSION["username"]);
} else {
    $order = range(1, count($companies), 1);
}

?>


<!-- Modal -->
<div id="reorder_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <!--Modal title and close button in header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Drag the companies in the order you want</h4>
            </div>

            <!--Modal body with draggable rows-->
            <div class="modal-body">
                <div id="reorder_container">
                    <ul id="sortable">

                        <!--make a line for each company (in the order of the user) with id line-(company id) so it can be serialized correctly-->
                        <?php for ($i = 0; $i < count($order); $i++) { ?>
                            <li id=line-<?php echo $order[$i]; ?>><?php echo $companies[$order[$i]]; ?></li>
                        <?php } ?>

                    </ul>

                </div>
            </div>

            <!--Modal footer with confirm-->
            <div class="modal-footer"></div>
        </div>

    </div>
</div>

<!--import jquery ui-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--Make the list with tag 'sortable' sortable-->
<script>
    $("#sortable").sortable({
        // when a change is made execute this function
        update: function () {
            // define the order
            let order = $(this).sortable('serialize');

            // send it to the server with POST
            $.ajax({
                type: 'POST',
                url: 'reordered.php',
                data: order
            })
        }
    });
</script>

