$(document).ready(function () {
    $i = 0
    $.ajax({
    type: "get",
    url: "https://www.mlserver.xyz/blog/?feed=rss2"
    }).done(function(result) {
        $(result).find("item").each(function() {
            if ($i >= 3) {
                return
            }
            $title = $(this).find('title').text()
            $link = $(this).find('link').text()
            $date = $(this).find('pubDate').text()
            $content = $(this).find('description').text()
            $encoded = $(this).find('content\\:encoded').text()
            //$startUrl = 'https://livedoor.blogimg.jp/meoto2408/imgs/';
            //$url = 'https://www.coraf.org/wp-content/themes/consultix/images/no-image-found-360x250.png';
            //if (~$encoded.indexOf($startUrl)) {
            //    $splits = $encoded.split($startUrl);
            //    $split = $splits[1].split('"')[0];
            //    $url = $startUrl + $split;
            //} 
            $("#blogs").append('<a href="' + $link + '" target="_blank" class="ca"><div class="card"><div class="imgframe"></div><div class="textbox"><div class="title">' + $title + '</div><div class="text">' + $content + '</div></div></div></a>');
            $i++
        });
    });
});