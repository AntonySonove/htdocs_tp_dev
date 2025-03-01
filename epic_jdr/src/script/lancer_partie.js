
//! dropdown des attaques
const boutonAttaqueJ1= document.getElementById("boutonAttaqueJ1");
const showMenuAttaqueJ1= document.getElementById("showMenuAttaqueJ1");

boutonAttaqueJ1.onmouseenter=(function(){mouseEnterAttaqueJ1()});
boutonAttaqueJ1.onmouseleave=(function(){mouseLeaveAttaqueJ1()});

function mouseEnterAttaqueJ1(){
    showMenuAttaqueJ1.classList.remove("menuCache");
}
function mouseLeaveAttaqueJ1(){
    showMenuAttaqueJ1.classList.add("menuCache")
}
const boutonAttaqueJ2= document.getElementById("boutonAttaqueJ2");
const showMenuAttaqueJ2= document.getElementById("showMenuAttaqueJ2");

boutonAttaqueJ2.onmouseenter=(function(){mouseEnterAttaqueJ2()});
boutonAttaqueJ2.onmouseleave=(function(){mouseLeaveAttaqueJ2()});

function mouseEnterAttaqueJ2(){
    showMenuAttaqueJ2.classList.remove("menuCache");
}
function mouseLeaveAttaqueJ2(){
    showMenuAttaqueJ2.classList.add("menuCache")
}

//! tableau des stats des joueurs
// joueur
export let joueur=[
    stat={
        nom:"Antony",
        pv:50,
        pm:6,
        atk:10,
        atkm:10,
        def:5,
        defm:5,
        vit:2,
        pvMax:50,
        pmMax:6,
    },
];
compJoueur=[
    attaquePhysique={
        cout:0,
        degats:0,
    },
    attaqueMagique={
        cout:0,
        degats:0,
    }
];
joueur.push(compJoueur); //? sera utile plus tard pour la manipulation de variables plus complexes
console.log(joueur);


// pnj
let pnj=[
    stat={
        nom:"Jury",
        pv:50,
        pm:6,
        atk:10,
        atkm:10,
        def:5,
        defm:5,
        vit:1,
        pvMax:50,
        pmMax:6,
    },
];
compPnj=[
    attaquePhysique={
        cout:0,
        degats:0,
    },
    attaqueMagique={
        cout:0,
        degats:0,
    }
];
pnj.push(compPnj);
console.log(pnj);

//! infos qui apparaitront dans le html
//* création de la div pour les infos du combat (non définitive)
const infoJ1=document.getElementById("infoJ1");
const infoJ2=document.getElementById("infoJ2");

const recapBattle=document.createElement("div");
const recapBattleP=document.getElementById("recapBattleP");
recapBattle.classList.add("divJaune");
recapBattle.style.minWidth="300px"
recapBattle.style.fontSize="20px"
recapBattle.style.lineHeight="1.5"


//! construction des ul et li pour une meilleur visibilité dans le récap de la simulation
let tour=0;
let recapBattleDiv=document.createElement("div");
recapBattleDiv.style.minWidth="300px"
recapBattleDiv.style.fontSize="20px"
recapBattleDiv.style.lineHeight="1.5"
let recapBattleUl;
function addUl(){
    let recapBattleTour=document.createElement("h6");
    let text=document.createTextNode(`TOUR ${tour+=1}`);
    recapBattleTour.appendChild(text);
    recapBattleUl=document.createElement("ul");
    recapBattleUl.classList.add("recapBattleUl");
    recapBattleDiv.insertBefore(recapBattleUl,recapBattleDiv.children[0]);
    recapBattleDiv.insertBefore(recapBattleTour, recapBattleDiv.children[0]);
}
function addLi(t){
    let recapBattleLi=document.createElement("li");
    recapBattleUl.appendChild(recapBattleLi);
    let text=document.createTextNode(t);
    recapBattleLi.appendChild(text);
}

//*mise en place du texte qui apparaitra avant la première simulation de combat
const currentNameJ1=document.getElementById("currentNameJ1");
const currentNameJ2=document.getElementById("currentNameJ2");
currentNameJ1.innerText=joueur[0].nom
currentNameJ2.innerText=pnj[0].nom

const currentPvJ1=document.getElementById("currentPvJ1");
const currentPmJ1=document.getElementById("currentPmJ1");
const currentPvJ2=document.getElementById("currentPvJ2");
const currentPmJ2=document.getElementById("currentPmJ2");
currentPvJ1.style.color="red";
currentPmJ1.style.color="blue";
currentPvJ2.style.color="red";
currentPmJ2.style.color="blue";
currentPvJ1.innerText=`${joueur[0].pv}/${joueur[0].pvMax}`;
currentPmJ1.innerText=`${joueur[0].pm}/${joueur[0].pmMax}`;
currentPvJ2.innerText=`${pnj[0].pv}/${pnj[0].pvMax}`;
currentPmJ2.innerText=`${pnj[0].pm}/${pnj[0].pmMax}`;

//! première ébauche de simulation (attaque physique et magique)
//* le joueur lance attaquePhysique sur le pnj
// pnj[0].pv-=joueur[1][0].degats-pnj[0].def;
// console.log(pnj[0].pv);

//* le pnj lance attaquePhysique sur le joueur 
//? /!\ la defense du joueur est plus haute que l'attaque du pnj, donc il faut faire une condition, sinon la différence s'ajoute aux pv du joueur, ce qu'on veut éviter
// if (pnj[1][0].degats<joueur[0].def){
// } else {
//     joueur[0].pv-=pnj[1][0].degats-joueur[0].def;
// }
// console.log(joueur[0].pv);

//* le joueur lance attaqueMagique sur le pnj
// pnj[0].pv-=joueur[1][1].degats-pnj[0].defm;
// console.log(pnj[0].pv);


//* ajout de conditions (vitesse et cout en pm) pour l'attaqueMagique;
// if (joueur[0].vit>pnj[0].vit){
//     if (joueur[0].pm>joueur[1][1].cout){
//         joueur[0].pm-=joueur[1][1].cout;
//         pnj[0].pv-=joueur[1][1].degats-pnj[0].defm;
//     }
// }else{

// }
// console.log(joueur);
// console.log(pnj);

//! création des fonctions de simulation de combat
//* réalistation d'une attaque physique
function attaqueP(j1,j2){
    if (j1[0].pm>=j1[1][0].cout){ //? vérif cout en mp
        j1[0].pm-=j1[1][0].cout; //? déduction du coût en mp
        if (j1[1][0].degats+j1[0].atk>j2[0].def){ //? vérif stats pour ne pas se retrouver avec des valeurs négatives
            j2[0].pv-=j1[1][0].degats+j1[0].atk-pnj[0].def; //? déduction des dégâts sur les pv
        }
    } 
}
// attaqueP(joueur,pnj);
// console.log(joueur);
// console.log(pnj);

// attaqueP(pnj,joueur);
// console.log(joueur);
// console.log(pnj);

//* réalistation d'une attaque magique
function attaqueM(j1,j2){
    if (j1[0].pm>=j1[1][1].cout){ //? vérif cout en mp
        j1[0].pm-=j1[1][1].cout; //? déduction du coût en mp
        if (j1[1][1].degats+j1[0].atkm>j2[0].defm){ //? vérif stats pour ne pas se retrouver avec des valeurs négatives
            j2[0].pv-=j1[1][1].degats+j1[0].atkm-pnj[0].defm; //? déduction des dégâts sur les pv
        }
    } 
    else { 
        console.log(j1[0].nom,"n'a pas assez de pm.");
        recapBattle.innerText+=`mais ${j1[0].nom} n'a pas assez de pm.\n`;
        addLi(`mais ${j1[0].nom} n'a pas assez de pm.\n`);
    }
}
// attaqueM(joueur,pnj);
// console.log(joueur);
// console.log(pnj);

// attaqueM(pnj,joueur);
// console.log(joueur);
// console.log(pnj);

//! fonction de simulation de combat qui contrôle les pv et les priorités grâce à la stat de vit
function priorite(j1,choixJ1,j2,choixJ2){ //? ici on récoupère les fonctions stockées lors du choix de l'attaque
    //recapBattleP.insertBefore(recapBattle, recapBattleB);
    recapBattleP.insertBefore(recapBattleDiv, recapBattleB);
    addUl();
    if (j1[0].pv>0 && j2[0].pv>0){ //? vérif des pv 
        if (j1[0].vit>j2[0].vit){ //? vérif des vit (dans ce if j1 agira en premier)
            choixJ1(j1,j2); //? attaque de j1
            if(j2[0].pv<=0){ //? vérif si j2 est mort
                j2[0].pv=0;
            // console.log(j1[0].nom,"a vaincu",j2[0].nom,"!");
            recapBattle.innerText+=`${j1[0].nom} a vaincu ${j2[0].nom}!\n`;
            addLi(`${j1[0].nom} a vaincu ${j2[0].nom}!\n`);
            secousseJ2prio2();
            } 
            else {
                choixJ2(j2,j1); //? attaque de j2
                if(j1[0].pv<=0){ //? vérif si j1 est mort
                    j1[0].pv=0;
                    // console.log(j2[0].nom,"a vaincu",j1[0].nom,"!");
                    recapBattle.innerText+=`${j2[0].nom} a vaincu ${j1[0].nom}!\n`;
                    addLi(`${j2[0].nom} a vaincu ${j1[0].nom}!\n`);
                }
            }    
        } 
        else { //? dans le cas ou j2 est plus rapide que j1
            choixJ2(j2,j1); //? attaque de j2
            if(j1[0].pv<=0){ //? vérif si j1 est mort
                j1[0].pv=0;
                // console.log(j2[0].nom,"a vaincu",j1[0].nom,"!");
                recapBattle.innerText+=`${j2[0].nom} a vaincu ${j1[0].nom}!\n`;
                addLi(`${j2[0].nom} a vaincu ${j1[0].nom}!\n`);
            } 
            else {
                choixJ1(j1,j2); //? attaque de j1
                if(j2[0].pv<=0){ //? vérif si j2 est mort
                    j2[0].pv=0;
                // console.log(j1[0].nom,"a vaincu",j2[0].nom,"!");
                recapBattle.innerText+=`${j1[0].nom} a vaincu ${j2[0].nom}!\n`;
                addLi(`${j1[0].nom} a vaincu ${j2[0].nom}!\n`);
                }
            }
        }    
        // console.log(j1[0].nom,":",j1[0].pv,"pv",j1[0].pm,"pm"); //? mise à jour des stats des joueurs
        // console.log(j2[0].nom,":",j2[0].pv,"pv",j2[0].pm,"pm");
        currentPvJ1.innerText=`${j1[0].pv}/${j1[0].pvMax}`
        currentPmJ1.innerText=`${j1[0].pm}/${j1[0].pmMax}`
        currentPvJ2.innerText=`${j2[0].pv}/${j2[0].pvMax}`
        currentPmJ2.innerText=`${j2[0].pm}/${j2[0].pmMax}`
        // boutonBattle.disabled=true;
        // boutonJ2.disabled=true;
        readyJ1=0; //? blocage du bouton battle 
        readyJ2=0;
        disabledBattle();
    } 
    else {
        if (j1[0].pv<=0){
            // console.log(j1[0].nom,"n'a plus de pv.");
            recapBattle.innerText+=`${j1[0].nom} n'a plus de pv.\n`
            addLi(`${j1[0].nom} n'a plus de pv.\n`);
        } 
        else{ 
            // console.log(j2[0].nom,"n'a plus de pv.");
            recapBattle.innerText+=`${j2[0].nom} n'a plus de pv.\n`
            addLi(`${j2[0].nom} n'a plus de pv.\n`);
        }
    }
    emptySelected();
}  
// priorite(joueur,attaqueM,pnj,attaqueM);
// console.log(joueur);
// console.log(pnj);

// priorite(pnj,attaqueM,joueur,attaqueM);
// console.log(joueur);
// console.log(pnj);

//! config bouton battle
const boutonBattle=document.getElementById("boutonBattle");
let readyJ1=0;
let readyJ2=0; //? variables qui permettront de vérouiller/dévérouiller le bouton Battle si les deux joueurs n'on pas sélectionné une attaque (0=vérouillé, 1=dévérouillé)

function readyCheckJ1(){ //? fonction qui permet de valider qu'un choix à été fait par J1
    readyJ1=1;
    // console.log(readyJ1);
}
function readyCheckJ2(){ //? fonction qui permet de valider qu'un choix à été fait par J2
    readyJ2=1;
    // console.log(readyJ2);
}
function disabledBattle(){ //? fonction qui controle les valeurs 0 et 1 pour vérouiller/dévérouiller le bouton Battle
    if(readyJ1==0 || readyJ2==0){
        boutonBattle.disabled=true;
    }
    else if(readyJ1==1 && readyJ2==1){
        boutonBattle.disabled=false;
    }  
}
disabledBattle();
boutonBattle.addEventListener("click",()=>{
    priorite(joueur,choixJ1,pnj,choixJ2);
})

let choixJ1;
let choixJ2;

function choixAttaqueJ1(f){
    choixJ1=f;
}
function choixAttaqueJ2(f){
    choixJ2=f;
}
// choixAttaqueJ1(attaqueM);
// console.log(choixJ1);

// choixAttaqueJ2(attaqueP);
// console.log(choixJ2);

//! création des fonctions pour les différentes attaques
//* Coup d'épée
function coupEpee(j1,j2){
    j1[1][0].degats+=2;
    // console.log(j1[0].nom,"utilise Coup d'épée!");
    recapBattle.innerText+=`${j1[0].nom} utilise Coup d'épée!\n`;
    addLi(`${j1[0].nom} utilise Coup d'épée!\n`);
    // console.log(j1[1][0].degats);
    attaqueP(j1,j2);
    j1[1][0].degats=0;
    // console.log(j1[1][0].degats);
}
//! Affichage de l'attaque qui sera utilisée
const nomAttaqueJ1=document.getElementById("nomAttaqueJ1");
const nomAttaqueJ2=document.getElementById("nomAttaqueJ2"); //? const qui qui serviront de paramettre dans les fonctions nomDeLAttaqueSelected

function coupEpeeSelected(j){ //? le paramètre est entré directement dans le html
    j.innerText="Coup d'épée"
}
function emptySelected(){
    nomAttaqueJ1.innerText=``;
    nomAttaqueJ2.innerText=``;
}
// ! appliquer le addEventListener sur les fonctions
const coupEpeeButtonJ1=document.getElementById("coupEpeeButtonJ1");
coupEpeeButtonJ1.addEventListener("click",()=>{
    choixAttaqueJ1(coupEpee);
    coupEpeeSelected(nomAttaqueJ1);
    readyCheckJ1();
    disabledBattle();
});
const coupEpeeButtonJ2=document.getElementById("coupEpeeButtonJ2");
coupEpeeButtonJ2.addEventListener("click",()=>{
    choixAttaqueJ2(coupEpee);
    coupEpeeSelected(nomAttaqueJ2);
    readyCheckJ2();
    disabledBattle();
});

//* Boule de feu
function bouleDeFeu(j1,j2){
    j1[1][1].cout+=2;
    j1[1][1].degats+=4;
    // console.log(j1[0].nom,"utilise Boule de feu!");
    recapBattle.innerText+=`${j1[0].nom} utilise Boule de feu!\n`;
    addLi(`${j1[0].nom} utilise Boule de feu!\n`);
    // console.log(j1[1][1].degats);
    // console.log(j1[1][1].cout);
    attaqueM(j1,j2);
    j1[1][1].degats=0;
    j1[1][1].cout=0;
    // console.log(j1[1][1].degats);
    // console.log(j1[1][1].cout);
}
function bouleDeFeuSelected(j){
    j.innerText="Boule de feu"
}
const bouleDeFeuButtonJ1=document.getElementById("bouleDeFeuButtonJ1");
bouleDeFeuButtonJ1.addEventListener("click",()=>{
    choixAttaqueJ1(bouleDeFeu);
    bouleDeFeuSelected(nomAttaqueJ1);
    readyCheckJ1();
    disabledBattle();
});
const bouleDeFeuButtonJ2=document.getElementById("bouleDeFeuButtonJ2");
bouleDeFeuButtonJ2.addEventListener("click",()=>{
    choixAttaqueJ2(bouleDeFeu);
    bouleDeFeuSelected(nomAttaqueJ1);
    readyCheckJ2();
    disabledBattle();
});
//! animations
boutonBattle.addEventListener("click",()=>{
    setTimeout(()=>{
        infoJ1.animate(
            [
                {transform: "translateY(10px)"},
                {transform: "translateY(-10px)"},
            ],
            {
            duration: 100,
            iterations: 5,
            }
        );
    },1500);
    setTimeout(()=>{
        infoJ2.animate(
            [
                {transform: "translateY(10px)"},
                {transform: "translateY(-10px)"},
            ],
            {
            duration: 100,
            iterations: 5,
            }
        );
    },1000);
});
