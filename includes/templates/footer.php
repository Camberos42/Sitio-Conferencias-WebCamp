<footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>gldwebcamp</span></h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae repellendus repellat quas optio praesentium minus iusto tempore placeat! Illo quos aperiam neque earum consequatur dolorum nulla ea ducimus eius animi.</p>
            </div>
            <div class="ultimos-tweets">
                <h3>Ultimos <span>tweets</span></h3>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. #Pellentesque nec @camberos42</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. #Pellentesque nec @camberos42</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. #Pellentesque nec @camberos42</li>
                </ul>
            </div>
            <div class="menu">
                <h3>Redes <span>sociales</span></h3>
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-pinterest-square"></i></a>
                    <a href="#"><i class="fab fa-youtube-square"></i></a>
                    <a href="#"><i class="fab fa-instagram-square"></i></a>
                </nav>
            </div>
        </div>

        <p class="copyright">
            Todos los derechos Reservados GLDWEBCAMP 2026
        </p>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <?php
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<script src="js/jquery.colorbox-min.js"></script>';
        }else if($pagina == 'conferencia'){
            echo '<script src="js/lightbox.js"></script>';
        }
    ?>
    <script src="js/main.js"></script>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/2a6bb495a0707a297e6797054/9d71dcd9ccafb06dbeef2365f.js");</script>
</body>

</html>