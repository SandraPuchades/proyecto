document.addEventListener('DOMContentLoaded', function() {
    let anyadir = document.getElementById('newgrupo');
    let formulario = document.getElementById('formulario');

    formulario.style.display = 'none';

    anyadir.addEventListener('click', function () {
        formulario.style.display = 'block';
    });

    document.querySelectorAll('.eliminar').forEach(function(eliminarBtn) {
        eliminarBtn.addEventListener('click', function () {
            let grupoId = this.getAttribute('groupId');
            fetch('/eliminarUsuarioGrupo', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ grupoId: grupoId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    eliminarBtn.closest('.grupo').remove();
                } else {
                    alert('Hubo un error al intentar eliminar el grupo.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
