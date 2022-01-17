const inputFile = document.querySelector('#file');
const archiveName = document.querySelector('#archiveName');

inputFile.addEventListener('change', function(event) {
  let name = this.files[0].name;
  let extension = name.split('.')
  const formats = ['jpg','png','jpeg']

  const verify = formats.includes(extension[extension.length - 1])
  if(!verify){
    archiveName.innerHTML = "Formato de arquivo inválido: " + extension[extension.length - 1];
  }else{
    archiveName.innerHTML = name;
  }
})