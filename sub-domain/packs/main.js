var request = new XMLHttpRequest();

request.open('GET', 'https://api.github.com/repos/MonsterLifeServer/resoucepacks/releases/latest', true);
request.responseType = 'json';

request.onload = function () {
    var data = this.response;
    console.log(data["assets"]);
    var temp2 = "";
    for( $temp in data["assets"]) {
        console.log();
        temp2 += "<a href='"+data["assets"][$temp]["browser_download_url"]+"'>"+data["assets"][$temp]["name"]+"</a><br>";
    }
    var elem = document.getElementById("test");
    elem.innerHTML = temp2;
};
request.send();