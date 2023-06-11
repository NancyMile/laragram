import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    //init function esto se ejecuta cuando dropzone es inicialiado
    init: function () {
        //alert('Dropzone inicialiado');

        //ejecute este codigo solamente si hay un image preview
        if(document.querySelector('[name = "imagen"]').value.trim()){
            //inicialio una constante como objeto
            const imagenPublicada = {}
            imagenPublicada.size = 1234 // una valor no obligatorio, di uno ramdon
            imagenPublicada.name = document.querySelector('[name = "imagen"]').value;

            ///las siguientes son opciones de dropzone
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada,`/uploads/$(imagenPublicada.name)`);

            imagenPublicada.previewElemt.classList.add('dz-success','d-complete');
        }
    },
});

// dropzone.on('sending', function(file, xhr, formData){
//     // info about the image
//     //console.log(file);
//     //form data me  sirve para sibir enviar info para header por ejemplo
//     console.log(formData);
// });

dropzone.on('success', function(file,response){
    //retorna  la respuest del controlador
    //console.log(response.imagen);
    //asigno  ese valor  al input hidden de la vista create
    document.querySelector('[name = "imagen"]').value = response.imagen;
});

// dropzone.on('error', function(file,message){
//     console.log(message);
// });

dropzone.on('removedfile', function(){
    //console.log('Archivo Elimar');
    document.querySelector('[name = "imagen"]').value = '';
});