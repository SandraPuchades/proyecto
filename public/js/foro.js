document.querySelectorAll('.eliminar').forEach(function(eliminarBtn) {
    eliminarBtn.addEventListener('click', function () {
        let mensajeId = this.getAttribute('data-id');
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (confirm('¿Estás seguro de que quieres eliminar este mensaje?')) {
            fetch(`/eliminar/${mensajeId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    eliminarBtn.closest('.mensaje').remove();
                    alert('Mensaje eliminado');
                } else {
                    alert('Hubo un error al intentar eliminar el mensaje.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});

function scrollBottom(){
    const div = document.getElementById('foro');
    div.scrollTop = div.scrollHeight;
}

window.onload = function() {
    scrollBottom();
};
