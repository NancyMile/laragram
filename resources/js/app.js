import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,    
});

dropzone.on('sending', function(file, xhr, formData){
    // info about the image
    //console.log(file);
    //form data me  sirve para sibir enviar info para header por ejemplo
    console.log(formData);
});

dropzone.on('success', function(file,response){
    //retorna  la respuest del controlador
    console.log(response);
});

dropzone.on('error', function(file,message){
    console.log(message);
});


dropzone.on('removedfile', function(){
    console.log('Archivo Elimar');
});