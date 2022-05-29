  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. --}}
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('template/dasbhoard/plugins/jquery/jquery.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dasbhoard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
{{-- <script src="{{ asset('template/dashboard/dist/js/demo.js') }}"></script> --}}
<script src="{{ asset('template/dasbhoard/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('template/dasbhoard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('template/dasbhoard/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('template/dasbhoard/plugins/toastr/toastr.min.js')}}"></script>
@livewireScripts
@stack('scripts')