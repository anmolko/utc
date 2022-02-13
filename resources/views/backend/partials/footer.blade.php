</div>
</div>
</div>
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>

<script src="{{asset('assets/backend/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/backend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/select2/select2.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/select2/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>

<script src="{{asset('assets/backend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

<script src="{{asset('assets/backend/js/script.js')}}"></script>

<script src="{{asset('assets/backend/js/toastr.min.js')}}"></script>

<script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('assets/backend/js/sweetalert.min.js')}}"></script>

<script src="{{asset('assets/backend/js/form-validation.js')}}"></script>

<script type="text/javascript">
    $(function() {
        $( '#service-cat' ).tooltip();
    });

    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('success') }}");
    @endif
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif
    @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif


    @if($errors->has('slug'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ $errors->first('slug') }}");
    @endif


</script>
@yield('js')
@stack('scripts')


</body>
</html>
