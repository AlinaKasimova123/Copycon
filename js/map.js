ymaps = window.ymaps;
ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {center: [30.325, 59.935], zoom: 13});
}

    setTimeout(function(){
        var elem = document.createElement('script');
        elem.type = 'text/javascript';
        elem.src = '//api-maps.yandex.ru/2.0-stable/?apikey=fd9e0f88-f0fe-45a8-84e1-89a3d8562c21&load=package.standard&lang=ru-RU&onload=getYaMap';
        document.getElementsByTagName('body')[0].appendChild(elem);
    }, 2000);

    function getYaMap(){
        var myMap = new ymaps.Map("map",{center: [30.325,59.935],zoom: 13});
        ymaps.geocode("Ижевск, ул. Удмуртская, 195").then(function (res) {
            var coord = res.geoObjects.get(0).geometry.getCoordinates();
            var myPlacemark = new ymaps.Placemark(coord);
            myMap.geoObjects.add(myPlacemark);
            myMap.setCenter(coord);					
        });
    }