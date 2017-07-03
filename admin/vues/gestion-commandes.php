<?php
include(dirname(__FILE__) . '/../../inc/header.inc.php');
include(dirname(__FILE__) . '/../../inc/nav.inc.php');
include(dirname(__FILE__) . '/../../inc/section.inc.php');
//var_dump($getCommandes);
//var_dump($getDetailsCommande);
 ?>

        <h2 class="block-titre-principal">Gestion des commandes</h2>
        <div class="block main-block">
        <?php if (!isset($_GET['num_commande'])) : ?>
            <table id="tableUser" class="table comment" border=1 style="font-size: .9em;">
                <tr>
                    <?php $count = count($getCommandes[0]); ?>
                    <?php $i = 0; ?>
                    <?php foreach ($getCommandes[0] AS $key => $val) : ?>
                        <th style="font-size: .9em;"><?php echo $key; ?></th>
                        <?php if ($i == $count -1) : ?>
                            <th style="font-size: .9em;"><?php echo 'Supprimer'; ?></th>
                        <?php endif; ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($getCommandes AS $k => $v) : ?>
                    <tr>
                        <?php $i = 0; ?>
                        <?php foreach ($v AS $k2 => $v2) : ?>
                            <?php if ($k2 == 'Pseudo') : ?>
                                <td style="font-size: .82em;color: #0085b2;"><?php echo $v2; ?>
                                <?php elseif ($k2 == 'Numéro de suivi') : ?>
                                    <td style="font-size: .82em;"><a href="/game_zone/admin/gestion-commandes/<?php echo $v2; ?>" style="color: #0085b2; text-decoration: none;"><?php echo $v2; ?></a></td>
                            <?php else : ?>
                                <td style="font-size: .82em;"><?php echo $v2; ?></td>
                            <?php endif; ?>
                            <?php if ($i == $count -1) : ?>
                                <td style="font-size: .82em;">
                                    <form class="formTrashCommandes" action="" method="post">
                                        <input type="hidden" name="id_comment" value="<?php echo $v['Numéro de suivi']; ?>">
                                        <input class="user-trash" type="submit" name="submitTrash" value="Delete" >
                                    </form>
                                </td>
                            <?php endif; ?>
                            <?php $i++;?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php elseif (!empty($tabLigne)) : ?>
            <?php //var_dump($tabLigne); ?>
            <?php
                echo '<h2 style="color: #3d3d3d; text-align: center; font-family: \'Montserrat\', sans-serif;">Commande numéro ' . $_GET['num_commande'] . '</h2>';
                echo '<table class="table profil" border=1 style="border-collapse: collapse;font-size: .8em;">';
                    $i = 0;
                    $keys = array_keys($tabLigne[0]);
                    echo '<tr>';
                    foreach ($keys AS $val) {
                        if ($val == 'image_1') {
                            echo '<th>' . ucfirst('visuel') . '</th>';
                        }
                        else if ($val == 'prix_unitaire') {
                            echo '<th>' . ucfirst('prix unitaire') . '</th>';
                        }
                        else {
                            echo '<th>' . ucfirst($val) . '</th>';
                        }
                        if ($i == count($keys) - 1) {
                            echo '<th>' . ucfirst('prix total') . '</th>';
                        }
                        $i++;
                    }
                    echo '</tr>';
                    foreach ($tabLigne AS $k => $v) {
                        $i = 0;
                        echo '<tr>';
                        foreach ($v AS $k2 => $v2) {
                            if ($k2 == 'image_1') {
                                echo '<td style="background: url(' . $v2 . ') no-repeat center 50% / 65%;"></td>';
                            }
                            else if ($k2 == 'nom') {
                                echo '<td style="font-size: .85em;">' . $v2 . '</td>';
                            }
                            else {
                                echo '<td>' . $v2 . '</td>';
                            }
                        }
                        if ($i == count($v2) - 1) {
                            echo '<td>' . ($v['prix_unitaire'] * $v['quantite']) . '€</td>';
                        }
                        $i++;
                        echo '</tr>';
                    }
                    echo '</table>';
             ?>
        <?php endif; ?>
        </div>
 <?php
include(dirname(__FILE__) . '/../../inc/footer.inc.php');
?>
