//Delete actuality 

var btnDelete = document.querySelector("#btnDelete");

btnDelete.addEventListener("click", function(event){
  event.preventDefault();
  var idActuality = document.querySelector("#actualities").value;
  var wordingActuality = document.querySelector("#titleActu").value;
  if(confirm("Voulez-vous supprimer l'actualité " + idActuality+ " - " + wordingActuality + " ?")){

    document.location.href = "genererNewsAdminSupp&sup="+idActuality;
  }
});

