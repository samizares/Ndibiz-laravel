 @if(Session::has('success_code') && Session::get('success_code') == 220)
    <script type="text/javascript">
    $(function() {
        swal({ title: "Success!", 
                text: "{{ Session::get('report') }}",
                type: "success"
            });
    });
    </script>
    @endif