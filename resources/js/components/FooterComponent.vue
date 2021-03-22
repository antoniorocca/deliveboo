<template>

    <footer>
        <to-top></to-top>

        <a href="">
            <img id="footer_logo" :src="('../img/logo_white.svg')" alt="">
        </a>

        <div id="footer_container">

            <div class="row">

                <div class="col-lg-1 col-md-1 link"></div>

                <div id="workForUs" class="col-lg-3 col-md-3 col-sm-3">
                    <h3>Uniamo le forze</h3>
                    <ul>
                        <li><a href="">Lavora con noi</a></li>
                        <li><a href="">Negozi partner</a></li>
                        <li><a href="">Corrieri</a></li>
                        <li><a href="">Business</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 link">
                    <h3>Link di interesse</h3>
                    <ul>
                        <li><a href="">Chi siamo</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Contattaci</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-3 link">
                    <h3>Seguici</h3>
                    <ul>
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Twitter</a></li>
                        <li><a href="">Instagram</a></li>
                    </ul>
                </div>

                <div id="privacy" class="col-lg-3 col-md-3 col-sm-3">
                    <ul class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1">
                        <ul class="row row-cols-2 row-cols-sm-1 row-cols-md-1 row-cols-lg-1">
                            <li class="footer_img"><a href=""><img :src="('../img/download-button-android.svg')" alt=""></a></li>
                            <li class="footer_img"><a href=""><img :src="('../img/download-button-ios.svg')" alt=""></a></li>
                        </ul>
                        <ul class="row row-cols-3 row-cols-sm-1 row-cols-md-1 row-cols-lg-1">
                            <li><a href="">TERMINI E CONDIZIONI</a></li>
                            <li><a href="">POLITICA SULLA PRIVACY</a></li>
                            <li><a href="">POLITICA SUI COOKIE</a></li>
                        </ul>
                    </ul>
                </div>

            </div>
            
        </div>

    </footer>

</template>

<script>
export default {

}
</script>

<style>

</style>