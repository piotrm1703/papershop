<article>
    <h1 style="color:Tomato">Kontakt</h1>
    <pre>
    Wsparcie klienta               - przedsiebiorstwopoligraficzne@poczta.pl
    Dział sprzedaży (Adam Lisicki) - a.lisicki@poczta.pl
    Obsługa techniczna strony      - o.tech@poczta.pl
    Webmaster (Krzysztof Kot)      - k.kot@poczta.pl
    </pre>

    <h2 style="color:Tomato">Przedsiębiorstwo poligraficzne Sp. z o.o.</h2>
    <pre>
        ul. Przesiębiorcza 5
        26-800 Polia
        tel.  11 123 45 67
        tel.  11 234 56 78
    </pre>

    <h2 style="color:Tomato">Oddział II</h2>
    <pre>
        ul. Poligraficzna 6
        12-123 Myszów
        tel./fax 22 123 12 12
        kom. 567 234 234
    </pre>


    <p><b>Zapraszamy do korzystania z naszych usług.</b></p>

    <?php require_once ('contactform.php'); ?>
</article>

<?php

if(isset($_POST['submit'])){
    $name = htmlEscape($_POST['name']);
    $surname = htmlEscape($_POST['surname']);
    $email = htmlEscape($_POST['email']);
    $subject = htmlEscape($_POST['subject']);
    $content = htmlEscape($_POST['content']);
    $date = date("Y-m-d H:i:s");
    $status ='oczekujący';
    if(isset($name) && isset($surname) && isset($email) && isset($subject) && isset($content)){
        require_once ('connectDB.php');
        // Query
        $stmt = $pdo->query("INSERT INTO messages VALUES(NULL,'$name','$surname','$email','$subject','$content','$date','$status')");
        echo "<script> alert('Wiadomość została wysłana. Dziękujemy za kontakt!')</script>";
    } else {
        echo "Uzupełnij informacje!";
    }
}

//phpinfo();