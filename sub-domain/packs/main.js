var request = new XMLHttpRequest();

request.open('GET', 'https://api.github.com/repos/MonsterLifeServer/resoucepacks/releases/latest', true);
request.responseType = 'json';

request.onload = function () {
    var data = this.response;
    console.log(data["assets"]);
    var temp2 = "";
    for( $temp in data["assets"]) {
        $name = data["assets"][$temp]["name"].split(".zip")[0];
        $url = data["assets"][$temp]["browser_download_url"];
        $sh_url = "https://github.com/MonsterLi...";
        $updated_at = "";
        
        var past_time = new Date(data["assets"][$temp]["updated_at"]);
        console.log(past_time);

        console.log(new Date());
        var diff_time = Date.now() - past_time.getTime();

        var pass_seconds = Math.floor(diff_time / 1000);
        console.log(pass_seconds + "秒が経過");

        var pass_minutes = Math.floor(diff_time / (60 * 1000));
        console.log(pass_minutes + "分が経過");

        var pass_hours = Math.floor(diff_time / (60 * 60 * 1000));
        console.log(pass_hours + "時間が経過");

        var pass_dates = Math.floor(diff_time / (24 * 60 * 60 * 1000));
        console.log(pass_dates + "日が経過");

        var pass_years = Math.floor(diff_time / (365 * 24 * 60 * 60 * 1000));
        console.log(pass_years + "年が経過");
        if (pass_seconds < 60) $updated_at = pass_seconds + "秒前";
        else if (pass_minutes < 60) $updated_at = pass_minutes + "分前";
        else if (pass_hours < 24) $updated_at = pass_hours + "時間前";
        else if (pass_years < 1) $updated_at = pass_dates + "日前";
        else $updated_at = pass_years + "年前";

        temp2 += "<div class='BlogCard'>";
        temp2 += "<div class='BlogCard_img'><img src='https://raw.githubusercontent.com/MonsterLifeServer/resoucepacks/master/"+$name+"/pack.png'></img></div>";
        temp2 += "<div class='BlogCard_content'><b>"+data["assets"][$temp]["name"]+"</b><br />";
        temp2 += "<div class='content'>undefined</div>";
        temp2 += "<div class='updated'>"+$updated_at+"</div></div>";
        temp2 += "<div class='BlogCard_url'>"+$sh_url+"</div>"
        temp2 += "<a href='"+data["assets"][$temp]["browser_download_url"]+"'></a>";
        temp2 += "</div>";
    }
    var elem = document.getElementById('packs');
    elem.innerHTML = temp2;
};
request.send();

/**
 *     <div class="BlogCard">
        <img alt="画像の説明文"  />
        <b>
        記事タイトル
        </b>
        <div class="BlogCard_content">
        記事内容</div>
        
        <a href="記事URL"></a>
        </div>
 */