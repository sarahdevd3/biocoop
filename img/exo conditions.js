/*
let question1 = prompt("Combien font trois plus quatre ?");
if(question1==7){
    alert('"bonne réponse !"');
}else{
    alert('"essaie encore"');
};
*/
/*
let question2 = prompt("Êtes-vous sûr de vouloir effacer Windows ? oui/non");

if(question2=='oui'){
    alert('Allez, je supprime Windows\nPatientez svp ..."');
}else{
    alert('"OK\nje n\'effacerai pas Windows"');
};
*/
/*
let question3 = prompt("Quel est ton âge ?");
    if(question3>=0 && question3<18){
    alert('tu es encore mineur');

}else if(question3>18 && question3<30){
    alert('tu es encore jeune');
}else{
    alert('ôh, quelle sagesse !')
};
*/

let f = document.querySelector('#bouton');
f.addEventListener('click',function(){
    afficheResultat();
});

function afficheResultat(){

            let question1 =document.querySelector('#resultat').value;
            if (!isNaN(question1)){ 
            if (question1 == 7){
                alert ("Bonne réponse!");
                } else {alert("Essaie encore");}
            } else {alert ("mets un nb stp");}  
        }

/*let question1 = prompt("Combien font trois plus quatre ?", "");
if (question1 == 7) {
  alert("bonne réponse !");
} else {
  alert("essaie encore");
}*/

/*function afficheResultat(){
   let question1 = resultatEl.value;
   if (!isNaN(question1)){ 
     if (question1 == 7){
       alert ("Bonne réponse!");
     } else {alert("Essaie encore");}
   } else {alert ("mets un nb stp");}  
 }*/