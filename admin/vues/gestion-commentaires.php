<?php
include(dirname(__FILE__) . '/../../inc/header.inc.php');
include(dirname(__FILE__) . '/../../inc/nav.inc.php');
include(dirname(__FILE__) . '/../../inc/section.inc.php');
//var_dump($getAllUsers);
 ?>
        <h2 class="block-titre-principal">Gestion des membres</h2>
        <div class="block main-block">
            <h2 class="list-users">Liste de tous les commentaires</h2>
            <table id="tableUser" class="table comment" border=1 style="font-size: .9em;">
                <tr>
                    <?php $count = count($getAllComments[0]); ?>
                    <?php $i = 0; ?>
                    <?php foreach ($getAllComments[0] AS $key => $val) : ?>
                        <th style="font-size: .9em;"><?php echo $key; ?></th>
                        <?php if ($i == $count -1) : ?>
                            <th style="font-size: .9em;"><?php echo 'Supprimer'; ?></th>
                        <?php endif; ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($getAllComments AS $k => $v) : ?>
                    <tr>
                        <?php $i = 0; ?>
                        <?php foreach ($v AS $k2 => $v2) : ?>
                            <?php if ($k2 == 'pseudo') : ?>
                                <td style="font-size: .82em;color: #0085b2;"><?php echo $v2; ?></td>
                            <?php elseif ($k2 == 'ID') : ?>
                                <td style="font-size: .82em;background: #323844;color: #fff;text-shadow: 0 0 .25em #000;border-right: 1px solid #999;"><?php echo $v2; ?></td>
                            <?php elseif ($k2 == 'note') : ?>
                                <td style="font-size: .85em;"><?php echo '<span style="color: #ffa500; font-size: 1.55em;">'.$v2.'</span>/10'; ?></td>
                            <?php elseif ($k2 == 'Nom de l\'article') : ?>
                                <td class="article_nom" style="font-size: .85em;"><?php echo $v2; ?></td>
                            <?php else : ?>
                                <td style="font-size: .82em;"><?php echo $v2; ?></td>
                            <?php endif; ?>
                            <?php if ($i == $count -1) : ?>
                                <td style="font-size: .82em;">
                                    <form class="formTrashComment" action="" method="post">
                                        <input type="hidden" name="id_comment" value="<?php echo $v['ID']; ?>">
                                        <input class="user-trash" type="submit" name="submitTrash" value="Delete" >
                                    </form>
                                </td>
                            <?php endif; ?>
                            <?php $i++;?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
 <?php
include(dirname(__FILE__) . '/../../inc/footer.inc.php');
?>
