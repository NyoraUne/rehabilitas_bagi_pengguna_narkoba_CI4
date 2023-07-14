     <?php if (session()->getFlashdata('success')) : ?>
         <div class="alert alert-success alert-dismissible fade show " role="alert">
             <strong>Selamat!</strong> Data berhasil di simpan.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php endif; ?>
     <?php if (session()->getFlashdata('Error')) : ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Perhatian!</strong> Data gagal di simpan.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php endif; ?>

     <?php if (session()->getFlashdata('success_hapus')) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Selamat!</strong> Data berhasil di hapus.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php endif; ?>
     <?php if (session()->getFlashdata('Error_hapu')) : ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Perhatian!</strong> Data gagal di hapus.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php endif; ?>
     <?php if (session()->getFlashdata('success_edit')) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Selamat!</strong> Data berhasil di Edit.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php endif; ?>
     <?php if (session()->getFlashdata('Error_edit')) : ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Perhatian!</strong> Data gagal di Edit.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php endif; ?>