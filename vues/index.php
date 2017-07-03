<?php
//$txt = 'Lorem ipsum sin amet consectetur Lorem ipsum sin amet consectetur Lorem ipsum sin amet consectetur Lorem ipsum sin amet consectetur Lorem ipsum sin';
//echo strlen($txt);//150 max (car $txt fait 147)
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
$tab_replace = array(" ", "'", "\"", ".", "_", ")", "(");
$distinctCat = selectDistinctCat();
 ?>
        <h2 class="block-titre-principal">A la une</h2>
		<?php foreach ($distinctCat AS $v) : ?>
	<?php
	$newsByCat = newsByCat ($v['nom']);
	//var_dump($newsByCat);
	?>
	<div class="container-news">
		<h2 class="titre-en-tete"><?php echo $v['nom']; ?></h2>
		<div class="news">
	<?php
	$i = 0;
	foreach ($newsByCat AS $key => $val) {
		//echo $i;
		//var_dump($newsByCat);
		?>

		<?php
		if (isset($newsByCat[$i])) {
			if ($i == 0) : ?>
				<div class="container-block-news">
				  <a href="<?php echo '/game_zone/' . strtolower(str_replace('é', 'e', str_replace(' ', '-', $v['nom']))) . '/' . str_replace('é', 'e', strtolower(str_replace(' ', '-', $val['sous_categorie']))) . '/' . $val['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $val['nom'])); ?>">
					<div class="block block-big">
						<div class="news-block-1">
							<div class="news-logo">
								<?php echo $val['marque']; ?>
							</div>
							<div class="news-titre">
								<?php echo $val['nom']; ?>
							</div>
							<div class="news-img" style="background: url('<?php echo htmlentities($val['image_1'], ENT_QUOTES); ?>')no-repeat center; background-size: auto 94%;">
							</div>
							<div class="news-desc">
								<p>
								<?php
								$desc = cut ($val['description'], 250, '...');
								echo $desc;
								?>
								</p>
							</div>
						</div>
						<div class="news-block-2">
							<div class="block-hover">
							</div>
							<div class="left">
							</div>
							<div class="right">
							  <div class="block-price">
								<div class="price">
								<?php
								  $price = searchPointPrice ($val['prix']);
								  echo $price;
								 ?>
								</div>
								</div>
							  <div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</a>
              </div>
			  <div class="container-block-news">
			<?php

			elseif ($i == 1) : ?>
			<a href="<?php echo '/game_zone/' . strtolower(str_replace('é', 'e', str_replace(' ', '-', $v['nom']))) . '/' . str_replace('é', 'e', strtolower(str_replace(' ', '-', $val['sous_categorie']))) . '/' . $val['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $val['nom'])); ?>">
				<div class="block block-large">
                  <div class="news-block-1">
                    <div class="news-logo">
                        <?php echo $val['marque']; ?>
                    </div>
                    <div class="news-titre">
                        <?php echo $val['nom']; ?>
                    </div>
                    <div class="news-img-desc">
                      <div class="news-img" style="background: url('<?php echo $val['image_1']; ?>')no-repeat center; background-size: auto 94%;">
						</div>
                      <div class="news-desc">
                          <p>
						  <?php
							$desc = cut ($val['description'], 150, '...');
							echo $desc;
							?>
						  </p>
                      </div>
                    </div>
                  </div>
                  <div class="news-block-2">
                    <div class="block-hover">
                    </div>
                    <div class="left">
                    </div>
                    <div class="right">
                      <div class="block-price">
                        <div class="price">
                          <?php
							$price = searchPointPrice ($val['prix']);
							echo $price;
							?>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
			</a>
			<?php
			elseif ($i == 2) : ?>
			<a href="<?php echo '/game_zone/' . strtolower(str_replace('é', 'e', str_replace(' ', '-', $v['nom']))) . '/' . str_replace('é', 'e', strtolower(str_replace(' ', '-', $val['sous_categorie']))) . '/' . $val['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $val['nom'])); ?>">
				<div class="block block-square block-one">
                    <div class="news-block-1">
                      <div class="news-logo">
                          <?php echo $val['marque']; ?>
                      </div>
                      <div class="news-titre">
                          <?php echo $val['nom']; ?>
                      </div>
                        <div class="news-img" style="background: url('<?php echo $val['image_1']; ?>')no-repeat center; background-size: auto 94%;">
						</div>
                    </div>
                  <div class="news-block-2">
                    <div class="block-hover">
                    </div>
                    <div class="left">
                    </div>
                    <div class="right">
                      <div class="block-price">
                        <div class="price">
                          <?php
							$price = searchPointPrice ($val['prix']);
							echo $price;
							?>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
			</a>
			<?php
			else : ?>
			<a href="<?php echo '/game_zone/' . strtolower(str_replace('é', 'e', str_replace(' ', '-', $v['nom']))) . '/' . str_replace('é', 'e', strtolower(str_replace(' ', '-', $val['sous_categorie']))) . '/' . $val['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $val['nom'])); ?>">
				<div class="block block-square">
                    <div class="news-block-1">
                      <div class="news-logo">
                          <?php echo $val['marque']; ?>
                      </div>
                      <div class="news-titre">
                          <?php echo $val['nom']; ?>
                      </div>
                        <div class="news-img" style="background: url('<?php echo $val['image_1']; ?>')no-repeat center; background-size: auto 94%;">
						</div>
                    </div>
                  <div class="news-block-2">
                    <div class="block-hover">
                    </div>
                    <div class="left">
                    </div>
                    <div class="right">
                      <div class="block-price">
                        <div class="price">
                          <?php
							$price = searchPointPrice ($val['prix']);
							echo $price;
							?>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
			</a>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
			<?php
			endif;
			$i++;
		}
	}
	?>
			</div>
		</div>
	<?php
endforeach;
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
