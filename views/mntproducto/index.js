let arrimg = [];
let myDropzone = new Dropzone(".dropzone", {
    url:'../../assets', //ruta donde se guardaran los archivos
    maxFilesize: 20,
    maxFiles: 20,
    acceptedFiles:'image/*,application/pdf,.psd',
    addRemoveLinks: true,
    dictremoveFile: 'Quitar', 

});

myDropzone.on("addedfile", files=>{
    arrimg.push(files);
    console.log(arrimg);
});

myDropzone.on("removedfile", files=>{
    arrimg = arrimg.filter(file => file.name !== files.name);
    console.log(arrimg);
});