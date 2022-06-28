 <!-- plugins:js -->
  <script src="{{ASSET('js/jquery-3.3.1.min.js')}}"></script>
  
  <script src="{{ASSET('js/plugins-jquery.js')}}"></script>
  <script src="{{ASSET('js/modal-demo.js')}}"></script>
  <script src="{{ASSET('js/sweetalert.js')}}"></script>
  <script src="{{ASSET('js/alerts.js')}}"></script>
  <script src="{{ASSET('js/form-cuti.js')}}"></script>
  <script src="{{ASSET('js/datatables.js')}}"></script>
  <script src="{{ASSET('js/datatables.min.js')}}"></script>
  <script src="{{ASSET('js/dataTables.dateTime.min.js')}}"></script>
  <script src="{{ASSET('js/moments.js')}}"></script>
  <script src="{{ASSET('vendors/selectize/js/standalone/selectize.js')}}"></script>
  @if (!(request()->is('login*')) or !(request()->is('register*')))
    <script type="text/javascript" src="{{ASSET('js/jquery.repeater.js')}}"></script>
    <script type="text/javascript" src="{{ASSET('js/custom.js')}}"></script>
  @endif
  <script src="{{ASSET('js/dashboard.js')}}"></script>
  @if (!(request()->is('izin*')))
    <script src="{{ASSET('js/clockpicker/clockpicker.js')}}"></script>
    <script src="{{ASSET('js/clockpicker/jquery-clockpicker.min.js')}}"></script>
    <script src="{{ASSET('js/clockpicker/timepicker.js')}}"></script>
  @endif
