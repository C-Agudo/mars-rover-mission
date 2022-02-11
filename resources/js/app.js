require('./bootstrap');

function getMapCoordinates(){
    fetch('/api/planets/Mars', {
        headers:{
            'Content-Type': 'application/json'
        },
        method:'GET'
    })
        .then(response =>response.json()
        ).then(
        function(result){
            console.log(result);
            drawMapFromPlanet(result);
            drawObstacles(result);
        })
        .catch(function (error) {
            console.log(error);
        });
}

getMapCoordinates();

function drawMapFromPlanet(planet){

    let mapSelector = document.getElementById('map');

    console.log(planet, "planet")
    let map = `<div class="map mx-auto">`;
    for (let y = 0; y < planet.coordinates[1]; y++) {
        map += `<div class="map-${x+1}">`;
        for (let x = 0; x < planet.coordinates[0]; x++) {

            map += `<div class="way (${x+1},${y+1})">(${x+1},${y+1})</div>`;
        }
        map += `</div>`;
    }
    map += `</div>`;

    document.getElementById("map").innerHTML = map;
}

function drawObstacles(planet){
    planet.obstacles_coordinates.forEach(element => {
        $class = '('+element[0]+','+element[1]+')';
        $obstacle = document.getElementsByClassName($class);
        console.log($obstacle, "obsta")
        $obstacle[0].classList.add("obstacle");
        /*
        if (element == [x,y]) {
            map += `<div class="obstacle">(${x+1},${y+1})</div>`;
        }
        */

    })
}
document.getElementById('landing').addEventListener("click",
function(event){
    event.preventDefault()
    let data={
        "id": "9d35e3d5-7029-4a8d-a76e-a515982b0083",
        'planet_name': "Mars",
        'position': [
            document.getElementById('x').value,
            document.getElementById('y').value
        ],
        'orientation': document.getElementById('orientation').value
    }
    console.log(data, "landing")
    fetch('/api/vehicle', {
        headers:{
            'Content-Type': 'application/json'
        },
        method:'PUT',
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(function(result){
            window.alert(result);
        })
        .catch(function (error) {
            console.log(error);
        });
    })

document.getElementById('move').addEventListener("click",
    function (event) {
    event.preventDefault()
        let data={
            "id": "9d35e3d5-7029-4a8d-a76e-a515982b0083",
            'planet_name': "Mars",
            'instructions': document.getElementById('instructions').value
        }
        fetch('/api/vehicle', {
            headers:{
                'Content-Type': 'application/json',
            },
            method:'PATCH',
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(function(result){
            })
            .catch(function (error) {
                console.log(error);
            });
    }
);

