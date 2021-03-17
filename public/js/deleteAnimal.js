//Delete actuality 

var btnDelete = document.querySelector("#btnDelete");

btnDelete.addEventListener("click", function(event){
  event.preventDefault();
  var idAnimal = document.querySelector("#idAnimal").value;
  var nameAnimal = document.querySelector("#animal").value;
  if(confirm("Voulez-vous supprimer l'animal "  + nameAnimal + " ?")){

    document.location.href = "genererPensionnairesAdminSupp&sup="+idAnimal;
  }
});

