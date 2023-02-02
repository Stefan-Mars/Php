<?php
function cool()
{
    if (isset($_SESSION['status'])){
        $rend = "jij bent officieel cool, want je bent ingelogd";
    }
    else{
        $rend = "jij bent niet cool, want je bent niet ingelogd";
        
    }
    return $rend;
}
?>