<nav class="menu">
   <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open">
   <label class="menu-open-button" for="menu-open">
    <span class="lines line-1"></span>
    <span class="lines line-2"></span>
    <span class="lines line-3"></span>
  </label>

   <a href="./home_riservata.php" class="menu-item orange">Home<i class="fa fa-star"></i> </a>
   <a href="./index.php" class="menu-item lightblue">Visualizza Stazioni<i class="fa fa-diamond"></i> </a>
   <?php
   if($_SESSION['tipo']=='A'){
      echo '<a href="./crea_stazione_form.php" class="menu-item blue">Crea Stazione<i class="fa fa-anchor"></i> </a>';
      echo '<a href="./aggiungi_bici_form.php" class="menu-item green">Aggiungi Bici<i class="fa fa-coffee"></i> </a>';
      echo '<a href="./aggiungi_tessera_form.php" class="menu-item purple">Aggiungi tessera<i class="fa fa-microphone"></i> </a>';
      echo '<a href="./aggiungi_operazione_form.php" class="menu-item purple">Aggiungi operazioni<i class="fa fa-microphone"></i> </a>';
      echo '<a href="./visualizza_dati.php" class="menu-item purple">Visualizza utenti<i class="fa fa-microphone"></i> </a>';
   }
   else{
      echo '<a href="./visualizza_dati.php" class="menu-item purple">Visualizza Profilo<i class="fa fa-microphone"></i> </a>';
   }
   ?>
   <a href="./login.php" class="menu-item red">Log out<i class="fa fa-heart"></i> </a>
</nav>