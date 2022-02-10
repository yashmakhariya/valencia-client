 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
 </a>

 <audio id="notification-sound">
   <source src="{{url('admin-assets/audio/notification.ogg')}}" type="audio/ogg">\
 </audio>
 
 
 <button hidden onclick="document.getElementById('notification-sound').play(); " id="notification-sound-btn" type="button">Play Audio</button>

 <!-- Bootstrap core JavaScript-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="{{url('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{url('admin-assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{url('admin-assets/js/sb-admin-2.js')}}"></script>
 <script src="{{url('admin-assets/js/script.js')}}"></script>

 <!-- Page level plugins -->
 <script src="{{url('admin-assets/vendor/chart.js/Chart.min.js')}}"></script>

 <!-- Page level custom scripts -->
 <script src="{{url('admin-assets/js/demo/chart-area-demo.js')}}"></script>
 <script src="{{url('admin-assets/js/demo/chart-pie-demo.js')}}"></script>

<!-- Page level plugins -->
<script src="{{url('admin-assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{url('admin-assets/js/demo/datatables-demo.js')}}"></script>

@if($message = Session::get('message'))
<script defer>
    swal({
        title: "{{$message}}",
        icon: "success",
    })
</script>
@endif

@if($message = Session::get('error'))
<script defer>
    swal({
        title: "{{$error}}",
        icon: "error",
    })
</script>
@endif

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.data-table').DataTable({
            "order": [[ 0, "desc" ]],
        });
    });
</script>
