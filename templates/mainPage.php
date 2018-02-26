<script>

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    if(getCookie('cookies') === ''){

        var a = confirm("Ta strona wykorzystuje pliki cookie. Używamy informacji zapisanych za pomocą plików cookies w celu zapewnienia maksymalnej wygody w korzystaniu z naszego serwisu. Jeżeli wyrażasz zgodę na zapisywanie informacji zawartej w cookies kliknij 'OK' . Jeśli nie wyrażasz zgody, zostaniesz przekierowany na stronę google.com ")

        if(a === false){
            window.location.replace("https://www.google.pl")
        } else {
            setCookie('cookies','1',365);
        }
    }
</script>


<article >
    <h3 style="color:darkslategray">Witam na stronie głównej Przedsiębiorstwa Poligraficznego!</h3>
    <p>Przedsiębiorstwo  działa na rynku papierniczym od niemalże 30 lat.<br>Główna siedziba firmy mieści się w województwie mazowieckim, ale posiadamy biura handlowe w różnych częściach kraju.<br>
        Nasze magazyny mieszczą się w województwie mazowieckim oraz na pomorzu.<br>
        Jesteśmy firmą rodzinną, stawiamy na budowanie oraz rozwój pozytywnych relacji z naszymi klientami opartych na doświadczeniu, zaufaniu i przyjaźni.<br>
        Młody, profesjonalny zespół, bogata oferta handlowa, niewielkie marże oraz szybka realizacja zleceń to mocne strony przedsiębiorstwa.<br>
        Wykorzystując szerokie możliwości bezpośredniego importu oraz własne możliwości przerobowe papieru, oferujemy produkty wysokiej jakości w konkurencyjnych cenach.<br>
        Nasza oferta handlowa znana jest również za granicą. <br>
    <p>Dzięki długoletniej, bezpośredniej współpracy z wieloma producentami papieru, mamy duże możliwości dostosowania oferty handlowej do indywidualnych potrzeb naszych klientów, zarówno w zakresie cen jak i jakości produktów.</p>
    <p>Zapraszamy do korzystania z naszych usług.</p>
    <p>Zespół Przedsiębiorstwa Poligraficznego</p>

</article>