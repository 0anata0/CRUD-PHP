            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Anata <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>

            </div>

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Exit</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Yakin ingin keluar?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="assets-temp/vendor/jquery/jquery.min.js"></script>
            <script src="assets-temp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="assets-temp/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="assets-temp/dist/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="assets-temp/vendor/chart.js/Chart.min.js"></script>
            <script src="assets-temp/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="assets-temp/vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <script>
                // Call the dataTables jQuery plugin
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
            </body>

            </html>