 <!-- Main Footer -->
 <footer class="main-footer">
     <strong>Copyright &copy; <a href="https://www.instagram.com/nur_sabry/">Delegado</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 3.1.0
     </div>
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->
 <!-- jQuery -->
 <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap -->
 <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


 <!-- PAGE PLUGINS -->
 <!-- jQuery Mapael -->
 <script src="<?= base_url('assets/'); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/raphael/raphael.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
 <!-- ChartJS -->
 <script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>


 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?= base_url('assets/'); ?>dist/js/pages/dashboard2.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


 <!-- ChartJS -->
 <script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
 <!-- Page specific script -->
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $('#example2').DataTable({
             "paging": true,
             "lengthChange": true,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
         });



         //- PIE CHART -
         //-------------
         // Get context with jQuery - using jQuery's .get() method.
         var pieChartCanvas = $('#pieChart').get(0).getContext('2d')


         new Chart(pieChartCanvas, {
             type: 'pie',
             data: {
                 labels: [
                     'Probabilitas',
                     'IE',
                     'FireFox',
                     'Safari',
                     'Opera',
                     'Navigator',
                 ],

                 datasets: [{
                     data: [
                         700, 500, 400, 600, 300, 100
                     ],
                     backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                 }]
             },
             options: {
                 tooltips: {
                     callbacks: {
                         label: function(tooltipItem, data) {
                             var dataset = data.datasets[tooltipItem.datasetIndex];
                             var labels = data.labels[tooltipItem.index];
                             var currentValue = dataset.data[tooltipItem.index];
                             return labels + ": " + currentValue + " %";
                         }
                     }
                 },
                 responsive: true,
                 maintainAspectRatio: false,
                 legend: {
                     position: 'bottom'
                 },
                 plugins: {
                     datalabels: {
                         color: 'fff',
                         formatter: (value) => {
                             return value + '%';
                         }
                     }
                 }

             }
         })

     });
 </script>

 </body>

 </html>