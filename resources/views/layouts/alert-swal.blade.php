<script>
   function generateSwalPayload(title, message, icon) {
      Swal.fire({
            icon: icon,
            title: title,
            text: message,
            confirmButtonText: 'OKE'
      });
   }
</script>

@if ($message = session('success') ?: session('error') ?: session('warning') ?: session('info-html'))
   <script>
      document.addEventListener('DOMContentLoaded', function () {
         @if (session('success'))
            generateSwalPayload("Sukses", `{!! session('success') !!}`, "success");
         @elseif (session('error'))
            generateSwalPayload("Gagal", `{!! session('error') !!}`, "error");
         @elseif (session('warning'))
            generateSwalPayload("Perhatian", `{!! session('warning') !!}`, "warning");
         @elseif (session('info-html'))
            generateSwalPayload("Info", `{!! session('info-html') !!}`, "info");
         @endif
      });
   </script>
@endif

