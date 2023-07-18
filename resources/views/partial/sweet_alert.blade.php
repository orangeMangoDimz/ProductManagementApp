<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session('error') }}",
            confirmButtonText: 'Ok'
        })
        </script>
@elseif (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonText: 'Ok'
        })
    </script>
@endif