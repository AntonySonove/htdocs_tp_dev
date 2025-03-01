        <link rel="stylesheet" href="./src/style/lancer_partie.css">
        <main>
            <div class="column gap25 alignCenter">
                <div id="infoJoueur" class="row spaceBetween gap25 alignEnd">
                    <div id="infoJ1" class="divJaune column gap25 secousseJ1Prio1 secousseJ1Prio2">
                            <div class="row justifyCenter"><h4 id="currentNameJ1"></h4></div>
                            <div class="row spaceBetween">
                                <div class="row spaceBetween"><p>pv&nbsp;</p><p id="currentPvJ1"></p></div>
                                <div class="row spaceBetween"><p>pm&nbsp;</p><p id="currentPmJ1"></p></div>
                            </div>
                            <div class="column alignCenter">
                                <ul id="boutonAttaqueJ1">
                                    <li>Attaque
                                        <ul id="showMenuAttaqueJ1" class="menuCache menuCacheAbsolute">
                                            <li id="coupEpeeButtonJ1" class="ulLi ">Coup d'épée</li>
                                            <li id="bouleDeFeuButtonJ1" class="ulLi ">Boule de feu</li>
                                        </ul>
                                    </li>
                                </ul>
                                <div id="nomAttaqueJ1" class="nomAttaque"></div>
                            </div>
                    </div>
                    <button id="boutonBattle" class="boutonJaune">Battle!</button> 
                    <div id="infoJ2" class="divJaune column gap25 secousseJ2Prio1 secousseJ2Prio2">
                        <div class="row justifyCenter"><h4 id="currentNameJ2"></h4></div>
                        <div class="row spaceBetween">
                            <div class="row spaceBetween"><p>pv&nbsp;</p><p id="currentPvJ2"></p></div>
                            <div class="row spaceBetween"><p>pm&nbsp;</p><p id="currentPmJ2"></p></div>
                        </div>
                        <div class="column alignCenter">
                            <ul id="boutonAttaqueJ2">
                                <li>Attaque
                                    <ul id="showMenuAttaqueJ2" class="menuCache menuCacheAbsolute">
                                        <li id="coupEpeeButtonJ2" class="ulLi">Coup d'épée</li>
                                        <li id="bouleDeFeuButtonJ2" class="ulLi">Boule de feu</li>
                                    </ul> 
                                </li>
                            </ul>
                            <div id="nomAttaqueJ2" class="nomAttaque"></div>
                        </div>
                    </div>
                </div>
                <div id="recapBattleP" class="column alignCenter">
                    <div id="recapBattleB"></div>
                </div>
            </div>
        </main>
        