<?php
function setsession($first_name, $s_id, $user_type, $nationalcode)
{
    if (!empty($s_id)) {
        $session = [
            setcookie(
                "first_name",
                "$first_name",
                time() + 3600,
                "/"
            ),
            $_SESSION["id"] = $s_id,
            $_SESSION["user_type"] = $user_type,
            $_SESSION["nationalcode"] = $nationalcode,
        ];
        return $session;
    }
}

?>