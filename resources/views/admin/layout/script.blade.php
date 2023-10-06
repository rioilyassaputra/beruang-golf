 <!-- General JS Scripts -->
 <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
 <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

 <!-- JS Libraies -->
 <script src="{{ asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
 <script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

 <!-- Page Specific JS File -->
 <script src="{{ asset('admin/assets/js/page/index-0.js') }}"></script>

 <!-- Template JS File -->
 <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
 <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

 <script type="text/javascript">
      $('#delete').click(function(event) {
          var form = $(this).closest("form");
          event.preventDefault();
          swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
              })
              .then((result) => {
                  if (result.isConfirmed) {
                      form.submit();
                      Swal.fire(
                          'Deleted!',
                          'Your data has been deleted.',
                          'success'
                      )
                  }
              });
      });
  </script>
  <script>
     function previewImage(){
           const image = document.querySelector('#gambar');
           const imgPreview = document.querySelector('.img-Preview');

           imgPreview.style.display = 'block';

           const oFReader = new FileReader();
           oFReader.readAsDataURL(image.files[0]);

           oFReader.onload = function (oFREvent) {

             imgPreview.src = oFREvent.target.result;
           }
         }
  </script>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
   CKEDITOR.replace( 'deskripsi' );
   CKEDITOR.config.autoParagraph = false;
</script>
<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
$(function() {
    $('#Deskripsi').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});
</script>


