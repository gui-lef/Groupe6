
function verifInscription(){
    var verifmail=/^[a-zA-Z0-9]{1}[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/ ;
    var verifmdp=/^[a-zA-Z0-9_.*^!?$,;:\-+&@]*[A-Z]{1}[a-zA-Z0-9_.*^!?,;:\-+&@]*$/;

    var mdp=document.getElementById("mdp").value;
    var confmdp=document.getElementById("confMdp").value;
    var confemail=document.getElementById("confEmail").value;
    var email=document.getElementById("email").value;

    if (mdp.length <6){
        alert("Mot de passe trop court,veuillez saisir 6 caractères minimum");
        return false;
    }

   else if (!verifmdp.test(mdp)) {
       alert("Mot de passe doit avoir au moins une majuscule");
       return false;
   }

   else if (confmdp !== mdp){
       alert("Erreur dans la confirmation du mot de passe");
       return false;
   }

   else if (!verifmail.test(email)){
       alert("Adresse email invalide");
       return false;
   }
   else if(confemail !== email){
       alert("Erreur dans la confirmation de l'email")
        return false;
    }
   else {
       return true;
    }
}
document.getElementById("btnInscription").addEventListener("click", verifInscription , false);
