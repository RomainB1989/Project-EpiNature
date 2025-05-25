<main id="contact">
        <div class="formulary" id="form-contact">
            <h3>ENVOYER NOUS UN MESSAGE</h2>
            <form action="" method="post" enctype="text/plain" id="contact">
                <div>
                    <label for="nomContact">Nom :</label>
                    <input type="text" name="nom" id="nomContact" pattern="[\-a-zA-Z]{1,100}" title="Lettres et tiret uniquement (max 100 caractères)" placeholder="Ex: Bernard" />
                </div>
                <div>
                    <label for="emailContact">Adresse Mail :</label>
                    <input type="email" name="email" id="emailContact" pattern="[\-a-zA-Z0-9.%+]+@[\-a-zA-Z0-9.]+\.[a-z]{2,10}" title="exemple : nom@domaine.fr" placeholder="Ex: " required/>
                </div>
                <div>
                    <label for="objet">Objet du Message :</label>
                    <input type="text" name="objet" id="objet" />
                </div>
                <div>
                    <label for="message">Message :</label><br>
                    <textarea name="message" id="message" rows="10" required></textarea>
                </div>
                <div>
                    <input type="submit" value="ENVOYER MESSAGE" class="link" />
                </div>
            </form>
        </div>
        <div class="info-contact">
            <h3>Venez nous Rencontrer !</h2>
            <p class="important">Adresse :</p>
            <p>39 Pl. Saint-Jean 31660 Bessières.</p>
            <p>Tél de Marie : 06 63 42 42 10</p>
            <p>Tél du Fournil : 05 61 42 42 10</p>
            <p class="important">Ou nous Sommes :</p>
            <iframe title="Map Ump-OpenStreetMap Localisation Fournil EpiNature" frameborder="0" allowfullscreen allow="geolocation" src="https://umap.openstreetmap.fr/fr/map/localisations-epinature_1158085?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&editMode=disabled&moreControl=false&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=none&captionBar=false&captionMenus=true&datalayers=42468a56-94c8-473d-ba00-a3b23b6a1bf5#16/43.8007/1.6057"></iframe>
        </div>
    </main>