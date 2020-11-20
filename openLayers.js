// affichage map (visible uniquement sur mobile)

    var map = new ol.Map({
    target: 'map',
    layers: [
    new ol.layer.Tile({
        source: new ol.source.OSM()
    })
    ],
    view: new ol.View({
    center: ol.proj.fromLonLat([6.128650, 46.192960]),
    zoom: 19,
    minZoom: 5
    })
});                  

// affichage map (visibel uniquement sur écrans de taille moyenne et supérieure)

    var map2 = new ol.Map({
    target: 'map2',
    layers: [
    new ol.layer.Tile({
        source: new ol.source.OSM()
    })
    ],
    view: new ol.View({
    center: ol.proj.fromLonLat([6.128650, 46.192960]),
    zoom: 19,
    minZoom: 5
    })
});

// boutons pour afficher/masquer la map (visible uniquement sur mobile)

function toggleView() {
    var toggleDiv = document.getElementById("mapAPI");
    var hide = document.getElementById("btnHide");
    var show = document.getElementById("btnShow");

    if (toggleDiv.style.display === "none") {
        toggleDiv.style.display = "block";
        show.style.display = "none";
        hide.style.display = "inline";
        
    } else {
        toggleDiv.style.display = "none";
        hide.style.display = "none";
        show.style.display = "inline";
    }
}
