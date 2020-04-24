</div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>assets/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/js/jQuery.print.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

    <script src="<?php echo base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>


    <script src="<?php echo base_url();?>assets/dataTables-buttons/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/dataTables-buttons/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/dataTables-buttons/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/dataTables-buttons/buttons.html5.min.js"></script>

    <script src="<?php echo base_url();?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
    <script src="<?php echo base_url();?>assets/js/widgets.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/init-scripts/data-table/datatables-init.js"></script>

    
    <script src="<?php echo base_url();?>assets/js/funcs.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    

</body>

</html>

