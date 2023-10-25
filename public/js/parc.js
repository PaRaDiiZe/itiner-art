var xhr = new XMLHttpRequest();
var xhr2 = new XMLHttpRequest();

// Configuration de la carte Google Maps
var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng(48.5734053, 7.7521113)
};

// Création de la carte Google Maps
var map = new google.maps.Map(document.getElementById('carte'), mapOptions);

// Configuration des options de l'itinéraire
var directionsService = new google.maps.DirectionsService();
var directionsRenderer = new google.maps.DirectionsRenderer({
    map: map
});

if (document.title === "Quartier de la gare") {
    // Définition des points de départ, d'arrivée et intermédiaire
    var origin = new google.maps.LatLng(48.58861841512219, 7.739774935592602);
    var destination = new google.maps.LatLng(48.58328965384768, 7.737759155541721);
    var waypoints = [{
            location: new google.maps.LatLng(48.588073066476845, 7.739385182463061),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.587998565866606, 7.73921591972614),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.586289361475416, 7.7386613555418755),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.58625933787053, 7.73866072485514),
            stopover: true
        }
    ];
} else if (document.title === "Quartier Européen") {
    var origin = new google.maps.LatLng(48.59887611306426, 7.761044511363163);
    var destination = new google.maps.LatLng(48.59885174143995, 7.767867642049826);
    var waypoints = [{
            location: new google.maps.LatLng(48.59961917302625, 7.767748555542351),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.598018251593004, 7.775803424855624),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.59922035535843, 7.7738478420498165),
            stopover: true
        }
    ];
} else if (document.title === "Quartier Krutenau") {
    var origin = new google.maps.LatLng(48.58179086060664, 7.753621155541689);
    var destination = new google.maps.LatLng(48.5816273723293, 7.7577451401983595);
    var waypoints = [{
            location: new google.maps.LatLng(48.58351103558638, 7.754583370885105),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.590532989569034, 7.755829780210759),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.58110693910244, 7.754651742049186),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.5836288688954, 7.7552462690342505),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.581963479264694, 7.756505940198344),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.582471064692136, 7.757432697870066),
            stopover: true
        }
    ];
} else if (document.title === "Quartier Port Du Rhin") {
    var origin = new google.maps.LatLng(48.57044498075201, 7.795164740197958);
    var destination = new google.maps.LatLng(48.576475872912404, 7.791613955541507);
    var waypoints = [{
            location: new google.maps.LatLng(48.57037740453426, 7.79452667127116),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.57315547701843, 7.800106840198058),
            stopover: true
        },
        {
            location: new google.maps.LatLng(48.57260047300704, 7.793138424854704),
            stopover: true
        },
    ];
}

// Configuration de la demande d'itinéraire
var request = {
    origin: origin,
    destination: destination,
    waypoints: [{
        location: waypoint,
        stopover: true
    }],
    travelMode: google.maps.TravelMode.WALKING
};

// Envoi de la demande d'itinéraire au service de directions
directionsService.route(request, function (result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
        // Affichage de l'itinéraire sur la carte
        directionsRenderer.setDirections(result);
    }
});



// CAROUSSEL

$(document).ready(function () {
    $('.slick-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '.slick-prev',
        nextArrow: '.slick-next',
        responsive: [{
            breakpoint: 1024,
            settings: "unslick"
        }]
    });
});