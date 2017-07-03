<nav>
  <ul>
    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'consoles') {echo 'class="active"';} ?>><a href="/game_zone/consoles">Consoles</a>
        <ul>
            <li><a href="/game_zone/consoles/xbox-one">Xbox One</a></li>
            <li><a href="/game_zone/consoles/ps-4">PS 4</a></li>
            <li><a href="/game_zone/consoles/wii-u">Wii U</a></li>
        </ul>
    </li>
    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'jeux') {echo 'class="active"';} ?>><a href="/game_zone/jeux">Jeux</a>
        <ul>
            <li><a href="/game_zone/jeux/xbox-one">Xbox One</a></li>
            <li><a href="/game_zone/jeux/ps-4">PS 4</a></li>
            <li><a href="/game_zone/jeux/pc">PC</a></li>
            <li><a href="/game_zone/jeux/wii-u">Wii U</a></li>
        </ul>
    </li>
    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'pc-gaming') {echo 'class="active"';} ?>><a href="/game_zone/pc-gaming">PC Gaming</a>
    <ul>
        <li><a href="/game_zone/pc-gaming/desktop">Desktop</a></li>
        <li><a href="/game_zone/pc-gaming/portable">Portable</a></li>
    </ul>
    </li>
    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'peripheriques') {echo 'class="active"';} ?>><a href="/game_zone/peripheriques">Périphériques</a>
      <ul>
          <li><a href="/game_zone/peripheriques/manettes">Manettes</a></li>
          <li><a href="/game_zone/peripheriques/volants">Volants</a></li>
		  <li><a href="/game_zone/peripheriques/casques">Casques</a></li>
      </ul>
    </li>
  </ul>
</nav>
</div>
<div class="header-r">
<div class="header-r-connect">
  <a href="/game_zone/inscription" class="btn btn-signup">
                    S'inscrire
                </a>
  <a href="<?php if (!isset($_SESSION['utilisateur'])) {echo '/game_zone/connexion';}else{echo '/game_zone/deconnexion';} ?>" id="btnConnect" class="btn btn-connect">
                    <?php if(!isset($_SESSION['utilisateur'])){echo 'Connexion';}else{echo 'Deconnexion';} ?>
                </a>
</div>
</div>
<div class="clear"></div>
</div>
</header>
