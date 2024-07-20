document.getElementById('BtIniciar').onclick = function() {
    window.location.href = '{{ route("login") }}';
}

document.getElementById('BtEntrar').onclick = function() {
    window.location.href = '{{ route("home") }}';
}