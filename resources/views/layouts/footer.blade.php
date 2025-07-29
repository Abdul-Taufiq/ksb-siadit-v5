<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<!-- Icons library -->
<script src="{{ asset('template/plugins/feather.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('template/js/script.js') }}"></script>
<script src="{{ asset('template/js/darkmode-boostrap.js') }}"></script>
<!-- jQuery CDN -->
{{-- summernote js --}}
<script src="{{ asset('template/summernote/summernote-bs5.min.js') }}"></script>
{{-- select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- for livewire --}}
@stack('scripts')
{{-- tailwind dan flux --}}
{{-- @fluxScripts --}}

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- SWA Logout --}}
<script>
    $(function() {
        $(document).on('click', '#logout', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: 'Apa Anda Yakin?',
                text: "Apakah Anda Ingin Keluar Dari Aplikasi?",
                icon: 'question',
                theme: document.body.classList.contains('darkmode') ? "dark" : "light",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('logout') }}',
                        type: "POST",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function() {
                            window.location.href = "/login";
                        }
                    });
                }
            });
        });
    });
</script>

{{-- Sweet Alert Pesan Berhasil --}}
@if (session('AlertSuccess'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('AlertSuccess') }}',
            theme: document.body.classList.contains('darkmode') ? "dark" : "light",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

{{-- Sweet Alert Pesan Gagal --}}
@if (session('AlertFail'))
    <script>
        Swal.fire({
            title: 'Failed!',
            text: '{{ session('AlertFail') }}',
            theme: document.body.classList.contains('darkmode') ? "dark" : "light",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif


{{-- script lainnya --}}
<script src="{{ asset('script/script-lainnya.js') }}"></script>

@yield('script')
