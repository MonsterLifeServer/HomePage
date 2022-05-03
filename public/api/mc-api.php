<?php

header("Access-Control-Allow-Origin: *");

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'Minecraft API');
$func->setPageUrl($func->getUrl().'/api/ban-user');
$func->setDescription('Minecraft APIに関するページ');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
				<div class="contents">
                    <!-- パンくずリスト&最終更新日 -->
                    <div class="top-label">
                        <div class="item-left">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>


                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/api/">
                                        <span itemprop="name">API</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                                
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name"><?php echo $func->getTitle(); ?></span>
                                    </a>
                                    <meta itemprop="position" content="3" />
                                </li>
                            </ol>
                        </div>
                        <div class="item-right">
                            <p class="fileupdate right"><span class="title">最終更新日時: </span>
                            <?php
                                $filetime = filemtime(basename(__FILE__));
                                echo '<span class="date">'.date('Y/m/d ', $filetime).'</span>';
                                echo '<span class="time">'.date('H時i分', $filetime).'</span>'; 
                            ?></p>
                        </div>
                    </div>
                    <!-- パンくずリスト&最終更新日 -->
					<?php
                        if (isset($_GET["uuid"])) {
                            echo "<h3>Usernames from UUID</h3>";
                            foreach (uuid_to_usernames($_GET["uuid"]) as $key => $value2) {
                                echo $value2["name"] . "<br />";
                            }
                        } elseif (isset($_GET["mcid"])) {
                            echo "<h3>UUID from Username</h3>";
                            echo username_to_uuid($_GET["mcid"]) . "<br />";
                            echo format_uuid(username_to_uuid($_GET["mcid"]));
                        }
                    ?>
				</div>
            </div>
		</div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>

<?php

/**
 * Get UUID from Username
 *
 * @param  string       $username
 * @return string|bool  UUID (without dashes) on success, false on failure
 */ 
function username_to_uuid($username) {
    $profile = username_to_profile($username);
    if (is_array($profile) and isset($profile['id'])) {
        return $profile['id'];
    }
    return false;
}


/**
 * Get Profile (Username and UUID) from username
 *
 * @uses http://wiki.vg/Mojang_API#Username_-.3E_UUID_at_time
 * 
 * @param  string      $username
 * @return array|bool  Array with id and name, false on failure
 */ 
function username_to_profile($username) {
    if (is_valid_username($username)) {
        $json = file_get_contents('https://api.mojang.com/users/profiles/minecraft/' . $username);
        if (!empty($json)) {
            $data = json_decode($json, true);
            if (is_array($data) and !empty($data)) {
                return $data;
            }
        }
    }
    return false;
}

/**
 * Get username from UUID
 *
 * @uses http://wiki.vg/Mojang_API#UUID_-.3E_Name_history
 *
 * @param  string       $uuid
 * @return string|bool  Username on success, false on failure
 */ 
function uuid_to_username($uuid) {
    $uuid = minify_uuid($uuid);
    if (is_string($uuid)) {
        $json = file_get_contents('https://api.mojang.com/user/profiles/' . $uuid . '/names');
        if (!empty($json)) {
            $data = json_decode($json, true);
            if (!empty($data) and is_array($data)) {
                $last = array_pop($data);
                if (is_array($last) and isset($last['name'])) {
                    return $last['name'];
                }
            }
        }
    }
    return false;
}

/**
 * Get username from UUID
 *
 * @uses http://wiki.vg/Mojang_API#UUID_-.3E_Name_history
 *
 * @param  string       $uuid
 * @return list<string>|bool  Username on success, false on failure
 */ 
function uuid_to_usernames($uuid) {
    $uuid = minify_uuid($uuid);
    if (is_string($uuid)) {
        $json = file_get_contents('https://api.mojang.com/user/profiles/' . $uuid . '/names');
        if (!empty($json)) {
            $data = json_decode($json, true);
            if (!empty($data) and is_array($data)) {
                return $data;
            }
        }
    }
    return false;
}

/**
 * Check if string is a valid Minecraft username
 *
 * @param  string $string to check
 * @return bool   Whether username is valid or not
 */
function is_valid_username($string) {
    return is_string($string) and strlen($string) >= 2 and strlen($string) <= 16 and ctype_alnum(str_replace('_', '', $string));
}

/**
 * Remove dashes from UUID
 *
 * @param  string       $uuid
 * @return string|bool  UUID without dashes (32 chars), false on failure
 */ 
function minify_uuid($uuid) {
    if (is_string($uuid)) {
        $minified = str_replace('-', '', $uuid);
        if (strlen($minified) === 32) {
            return $minified;
        }
    }
    return false;
}

/**
 * Add dashes to an UUID
 *
 * @param  string       $uuid
 * @return string|bool  UUID with dashes (36 chars), false on failure
 */ 
function format_uuid($uuid) {
    $uuid = minify_uuid($uuid);
    if (is_string($uuid)) {
        return substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4) . '-' . substr($uuid, 20, 12);
    }
    return false;
}

?>