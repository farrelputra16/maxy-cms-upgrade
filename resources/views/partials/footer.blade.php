<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> @if (env('APP_ENV') == 'local')
                © {{env('APP_CLIENT')}}.
                @else
                © Maxy Academy.
                @endif
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Designed & Developed by PT Linkdataku Solusi Indonesia
                </div>
            </div>
        </div>
    </div>
</footer>
