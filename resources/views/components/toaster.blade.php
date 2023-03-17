@if (session()->has('success'))
    <script type="text/javascript">
        // var isRtl = $('html').attr('data-textdirection') === 'rtl';
        toastr['success'](
            '👋 {{ session("success") }}',
            'Success!', {
                closeButton: true,
                tapToDismiss: false,
                // rtl: isRtl
            }
        );
    </script>
@endif

@if (session()->has('error'))
    <script type="text/javascript">
        // var isRtl = $('html').attr('data-textdirection') === 'rtl';
        toastr['error'](
            '👋 {{ session("error") }}',
            'Error!', {
                closeButton: true,
                tapToDismiss: false,
                // rtl: isRtl
            }
        );
    </script>
@endif

@if (session()->has('info'))
    <script type="text/javascript">
        // var isRtl = $('html').attr('data-textdirection') === 'rtl';
        toastr['info'](
            '👋 {{ session("info") }}',
            'Info!', {
                closeButton: true,
                tapToDismiss: false,
                // rtl: isRtl
            }
        );
    </script>
@endif