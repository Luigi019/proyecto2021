<input type="checkbox" id="menu" />
<label for="menu" class="menu">
	<span></span>
	<span></span>
	<span></span>
</label>
<nav class="nav-menu">
    <div class="redondo"> 
        <?php if (file_exists("assets/images/2eb64db57e761a673196220bd11445e8.jpg")) { ?>
            <img class="logo_user" src="assets/images/2eb64db57e761a673196220bd11445e8.jpg">
        <?php } else{ ?>
            <img class="logo_user" src="../assets/images/2eb64db57e761a673196220bd11445e8.jpg">
        <?php } ?>
    </div>
    <ul>
        
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Nosotros</a></li>
            <li><a href="#">Noticias</a></li>
            <li><a href="#">Documentos</a></li>
            <li><a href="#">Galeria</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href="#">Visitantes</a></li>
            <li><a href="#">Chat</a></li>
   
    </ul>
</nav>