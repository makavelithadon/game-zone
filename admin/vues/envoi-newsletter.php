<?php
include(dirname(__FILE__) . '/../../inc/header.inc.php');
include(dirname(__FILE__) . '/../../inc/nav.inc.php');
include(dirname(__FILE__) . '/../../inc/section.inc.php');
//var_dump($getAllUsers);
 ?>
        <h2 class="block-titre-principal">Envoi de la newsletter</h2>
        <div class="block main-block">
            <h2 class="list-users">Envoyer la newsletter aux membres de la <span style="color: #0085b2;">Game ZONE</span></h2>
            <table width=100% cellpadding=0 cellspacing=0 border=0 style="background-color: #323844;">
                <tr>
                    <td height=40>

                    </td>
                </tr>
                <tr>
                    <td align=center>
                        <table cellpadding=0 cellspacing=0 border=0 width=800 style="background-color: #ffffff;box-shadow: 0px 0px .5em .05em #000000;">
                            <tr style="background-color: #0085B2;border-bottom-width: 1px; border-bottom-color: #3d3d3d;border-bottom-style:solid;">
                                <th>
                                    <table cellpadding=0 cellspacing=0 border=0>
                                        <tr>
                                            <td height=60 width=800 align=center>
                                                <h2 style="font-weight: lighter;font-family: Calibri, Arial, sans-serif; color: #ffffff;line-height: 58px;">Du nouveau dans la <span style="font-size: 1.2em;font-weight: bold;">GAME Zone !</span></h2>
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                            <tr>
                                <td height=200 style="background-color: #ffffff;">
                                    <table cellpadding=0 cellspacing=0 border=0>
                                        <tr>
                                            <td width=300 height=200>
                                                <img style="display: block; height: 200px;" src="/game_zone/img/tomb-raider-definitive-edition-xbox-one-xbox-oneimage-3-bis.png" alt="" />
                                            </td>
                                            <td width=500 height=200 style="vertical-align: middle;">
                                                <h3 style="text-align: center; font-family: Calibri, Arial, sans-serif; font-weight: lighter; color: #3d3d3d;margin-bottom:10px;">Chèr(e) <span style="color: #0085b2; font-size: 1.1em;font-weight: bold;">membre</span>, il y a du nouveau sur ton site préféré !</h3>
                                                <h4 style="text-align: center; font-family: Calibri, Arial, sans-serif; font-weight: lighter; color: #3d3d3d;">De nouveaux produits viennent d'arriver dans nos stocks, rien que pour toi...Alors n'attends plus et connecte-toi vite jeune <span style="color: #ffa500; font-size: 1em;font-weight: bold;">Gamer</span> !</h4>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #0085b2;border-top-width: 1px; border-top-color: #3d3d3d;border-top-style:solid;" height=200>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height=40>

                    </td>
                </tr>
            </table>
            <form class="form-newsletter" action="" method="post">
                <input type="submit" name="submitNewsletter" value="Envoyer la newsletter">
            </form>
        </div>
 <?php

include(dirname(__FILE__) . '/../../inc/footer.inc.php');
?>
