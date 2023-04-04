<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 elerhetoseg">
                <div class="oszlop1">
                    <div class="logo">
                        <img src="../kepek/ujlogo.png" class="img-fluid" alt="">
                    </div>
                    <p class="bemutato" id="rolunk">
                        Az R.N. Motorsport News 2023-ban alakult projektmunka céljából. Oldalunk kizárólag Forma-1-es hírekre specializálódott, tehát csak ebben a témában találhattok rajta tartalmakat. 
                    </p>
                    <div class="socialLinks" id="elerthetoseg">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="elerhet">
                <h6>
                        E-mail: random@random.hu
                    </h6>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 footermelle">
                <div class="oszlop2">
                    <h5>Legutóbbi hírünk:</h5>
                 <?php echo $elsohir; ?>
                </div>
                <div>
                    <h5>Következő futam:</h5>
                    <?php echo $kovifutam; ?>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p>&copy; Copyright 2023.</p>
                    </div>
                </div>
            </div>
        </div>
</footer>