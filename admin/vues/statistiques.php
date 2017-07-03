<?php
include(dirname(__FILE__) . '/../../inc/header.inc.php');
include(dirname(__FILE__) . '/../../inc/nav.inc.php');
include(dirname(__FILE__) . '/../../inc/section.inc.php');
 ?>
        <h2 class="block-titre-principal">Statistiques</h2>
        <div class="block main-block">
            <a href="/game_zone/admin/statistiques/articles-les-mieux-notes"><h2 class="list-users">Top 5 des articles les mieux notés par les membres</h2></a>
            <?php if(isset($_GET['action']) && $_GET['action'] == 'articles-les-mieux-notes') : ?>
                <table id="tableUser" class="table comment" border=1 style="font-size: .9em;margin-bottom: 50px;">
                    <tr>
                        <?php $count = count($tabMeilleureNote[0]); ?>
                        <?php $i = 0; ?>
                        <?php foreach ($tabMeilleureNote[0] AS $key => $val) : ?>
                            <th style="font-size: .9em;"><?php echo $key; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <?php foreach ($tabMeilleureNote AS $k => $v) : ?>
                        <tr>
                            <?php foreach ($v AS $k2 => $v2) : ?>
                                <?php if ($k2 == 'pseudo') : ?>
                                    <td style="font-size: .82em;color: #0085b2;"><?php echo $v2; ?></td>
                                <?php elseif ($k2 == 'image_1') : ?>
                                    <td style="font-size: .82em;background: url('<?php echo $v2; ?>') no-repeat center 50% / 100%;"></td>
                                <?php elseif ($k2 == 'note') : ?>
                                    <td style="font-size: .85em;"><?php echo '<span style="color: #ffa500; font-size: 1.55em;">'.$v2.'</span>/10'; ?></td>
                                <?php else : ?>
                                    <td style="font-size: .82em;"><?php echo $v2; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <a href="/game_zone/admin/statistiques/articles-les-mieux-vendus"><h2 class="list-users">Top 5 des articles les plus vendus</h2></a>
            <?php if(isset($_GET['action']) && $_GET['action'] == 'articles-les-mieux-vendus') : ?>
                <table id="tableUser" class="table comment" border=1 style="font-size: .9em;margin-bottom: 50px;">
                    <tr>
                        <?php $count = count($tabArticlesMieuxVendus[0]); ?>
                        <?php $i = 0; ?>
                        <?php foreach ($tabArticlesMieuxVendus[0] AS $key => $val) : ?>
                            <th style="font-size: .9em;"><?php echo $key; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <?php foreach ($tabArticlesMieuxVendus AS $k => $v) : ?>
                        <tr>
                            <?php foreach ($v AS $k2 => $v2) : ?>
                                <?php if ($k2 == 'Nombre de ventes') : ?>
                                    <td style="font-size: .82em;color: #0085b2;"><?php echo $v2; ?></td>
                                <?php elseif ($k2 == 'image_1') : ?>
                                    <td style="font-size: .82em;background: url('<?php echo $v2; ?>') no-repeat center 50% / 100%;"></td>
                                <?php else : ?>
                                    <td style="font-size: .82em;"><?php echo $v2; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <a href="/game_zone/admin/statistiques/membres-qui-achetent-le-plus"><h2 class="list-users">Top 5 des membres qui ont acheté le plus d'articles</h2></a>
            <?php if(isset($_GET['action']) && $_GET['action'] == 'membres-qui-achetent-le-plus') : ?>
                <table id="tableUser" class="table comment" border=1 style="font-size: .9em;margin-bottom: 50px;">
                    <tr>
                        <?php $count = count($tabMeilleurAcheteurQte[0]); ?>
                        <?php $i = 0; ?>
                        <?php foreach ($tabMeilleurAcheteurQte[0] AS $key => $val) : ?>
                            <th style="font-size: .9em;"><?php echo $key; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <?php foreach ($tabMeilleurAcheteurQte AS $k => $v) : ?>
                        <tr>
                            <?php foreach ($v AS $k2 => $v2) : ?>
                                <?php if ($k2 == 'Nombre d\'achats' || $k2 == 'pseudo') : ?>
                                    <td style="font-size: .82em;color: #0085b2;"><?php echo $v2; ?></td>
                                <?php elseif ($k2 == 'image_1') : ?>
                                    <td style="font-size: .82em;background: url('<?php echo $v2; ?>') no-repeat center 50% / 100%;"></td>
                                <?php else : ?>
                                    <td style="font-size: .82em;"><?php echo $v2; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <a href="/game_zone/admin/statistiques/membres-qui-depensent-le-plus"><h2 class="list-users">Top 5 des membres qui ont dépensé le plus pour la <span style="color: #0085b2;">Game ZONE</span></h2></a>
            <?php if(isset($_GET['action']) && $_GET['action'] == 'membres-qui-depensent-le-plus') : ?>
                <table id="tableUser" class="table comment" border=1 style="font-size: .9em;margin-bottom: 50px;">
                    <tr>
                        <?php $count = count($tabMeilleurAcheteurPrix[0]); ?>
                        <?php $i = 0; ?>
                        <?php foreach ($tabMeilleurAcheteurPrix[0] AS $key => $val) : ?>
                            <th style="font-size: .9em;"><?php echo $key; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <?php foreach ($tabMeilleurAcheteurPrix AS $k => $v) : ?>
                        <tr>
                            <?php foreach ($v AS $k2 => $v2) : ?>
                                <?php if ($k2 == 'Montant des achats') : ?>
                                    <td style="font-size: .82em;color: #0085b2;"><?php echo $v2 . ' €'; ?></td>
                                <?php elseif ($k2 == 'pseudo') : ?>
                                    <td style="font-size: .82em;color: #0085b2;"><?php echo $v2; ?></td>
                                <?php elseif ($k2 == 'image_1') : ?>
                                    <td style="font-size: .82em;background: url('<?php echo $v2; ?>') no-repeat center 50% / 100%;"></td>
                                <?php else : ?>
                                    <td style="font-size: .82em;"><?php echo $v2; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
 <?php

include(dirname(__FILE__) . '/../../inc/footer.inc.php');
?>
