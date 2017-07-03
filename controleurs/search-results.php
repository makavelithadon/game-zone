<?php

include(dirname(__FILE__) . '/../modeles/search-results.php');

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = strip_tags(htmlentities($_GET['search'], ENT_QUOTES));
    $resultSearch = search ($search);
}
else {
    $resultSearch = getAllProducts();
}

include(dirname(__FILE__) . '/../vues/search-results.php');

?>
