<?php

?>

</div>
<script src="scripts/jquery-3.1.1.min.js"></script>
<!--<script src="scripts/jquery.min.js"></script>-->
<script src="scripts/functions.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/dataTables.bootstrap.min.js"></script>
<script src="scripts/dataTables.editor.min.js"></script>
<script src="scripts/jquery.dataTables.min.js"></script>
<script src="scripts/jquery-ui-1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('table.default').dataTable({
            bStateSave: true,
            stateSave:true,
            sPaginationType: "full_numbers"
        });
    });
</script>
</body>
</html>
