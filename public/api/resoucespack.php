<html>
    <body>
        <span id="api"></p>
        <script>
            var request = new XMLHttpRequest();

            request.open('GET', 'https://api.github.com/repos/MonsterLifeServer/resoucepacks/releases/latest', true);
            request.responseType = 'json';

            request.onload = function () {
                var data = this.response;
                console.log(data["assets"]);
                var temp2 = '{';
                var temp3 = 1;
                for( $temp in data["assets"]) {
                    console.log();
                    temp2 += '"'+data["assets"][$temp]["browser_download_url"]+'":"'+data["assets"][$temp]["name"]+'"';
                    if (temp3 != sizeof(data["assets"])) {
                        temp2 += ',';
                    }
                    temp3++;
                }
                temp2 += "}";
                var tag = document.getElementById("api");
                tag.write(temp2);
            };
            request.send();
        </script>
    </body>
</html>