           </main>
           <footer class="py-4 bg-light mt-auto">
               <div class="container-fluid px-4">
                   <div class="d-flex align-items-center justify-content-between small">
                       <div class="text-muted">Copyright &copy; Your Website 2023</div>
                       <div>
                           <a href="#">Privacy Policy</a>
                           &middot;
                           <a href="#">Terms &amp; Conditions</a>
                       </div>
                   </div>
               </div>
               </div>
           </footer>
           </div>
           </div>
           <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
           <script src="<?= base_url('src/'); ?>js/scripts.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
           <script src="<?= base_url('src/'); ?>js/datatables-simple-demo.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

           <script>
               function confirmAction(event) {
                   var confirmation = confirm("Apakah Anda yakin untuk menghapus data?");

                   if (!confirmation) {
                       event.preventDefault();
                   }

                   return confirmation;
               }

               jQuery(document).ready(function($) {
                   $('#select').select2({
                       theme: 'bootstrap-5',
                       placeholder: "pilih Data"
                   });

               });
               jQuery(document).ready(function($) {
                   $('#select2').select2({
                       theme: 'bootstrap-5',
                       placeholder: "pilih Data"
                   });

               });
               jQuery(document).ready(function($) {
                   $('#select3').select2({
                       theme: 'bootstrap-5',
                       placeholder: "pilih Data"
                   });

               });
           </script>

           </body>

           </html>