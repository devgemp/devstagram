import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    /**
     * Funcionalidad cuando se monta el dropzone
     * y tenemos que recuperar la imagen
     */
    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

// Eventos de Dropzone
dropzone.on('success', (file, response) => {
    console.trace(response.imagen);
    document.querySelector('[name="imagen"]').value = response.imagen;
})

/**
 * Eliminamos el valor del input hidden
 * para que este no almacene en la DB
 */
dropzone.on('removedfile', () => {
    document.querySelector('[name="imagen"]').value = "";
})
