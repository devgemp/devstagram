import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false
});

// Eventos de Dropzone
dropzone.on('sending', (file, xhr, formData) => {
    console.log(formData);
})

dropzone.on('success', (file, response) => {
    console.log(response);
})

dropzone.on('error', (file, message) => {
    console.log(message);
})

dropzone.on('removedfile', () => console.log('Archivo eliminado'))
