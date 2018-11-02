<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="huset_ikon.png" />
</head>

<body>
    <header>
        <img src="Huset_logo_6_W.png" alt="huset_logo" width="50%" height="20%">
        <nav>
            <button class="menu-item">Events</button>
            <button class="menu-item">Skab Events</button>
            <button class="menu-item">Job</button>
            <button class="menu-item">Kontakt</button>
            <button class="menu-item">Om Huset</button>
            <button class="menu-item">Nyhedsbrev</button>
        </nav>
    </header>
    <div class="grid_container">
        <section class="slideshow">
            <div class="slideshow_parent_container">
                <div class="slideshow_text_container">
                    <div class="slideshow_overskrift">
                        <div class="mySlides fade">
                            <section class="container">
                                <template id="temp">
           <article id="data-page">
               <h2 id="data-pagetitle">title</h2>
               <p id="text"></p>
                                </article>
                                </template>
                            </section>
                        </div>
                        <div class="slideshow_text">
                            <p>Hola med dig</p>
                        </div>
                    </div>
                </div>
                <div class="slideshow_billede_container">
                    <div class="mySlides fade">

                        <img src="" style="width:100%">

                    </div>

                    <div class="mySlides fade">

                        <img src="" style="width:100%">

                    </div>

                    <div class="mySlides fade">

                        <img src="" style="width:100%">

                    </div>

                </div>
            </div>
        </section>
    </div>
    <script>
        let pagetemplate = document.querySelector("#temp");
        let container = document.querySelector(".container");


        let myList = [];

        document.addEventListener("DOMContentLoaded", getJson);


        async function getJson() {


            //SÆT LINK IND TIL POST HERUNDER I FETCH
            let JsonObjekt = await fetch("http://ansaari.dk/kea/huset/wordpress/wp-json/wp/v2/posts?slug=morgen-gymnastik");
            myList = await JsonObjekt.json();
            console.log(myList);

            visSiden();
        }

        function visSiden() {


            myList.forEach(mypost => {

                console.log(mypost.title.rendered);

                let klon = pagetemplate.cloneNode("true").content;

                klon.querySelector("#data-pagetitle").textContent = mypost.title.rendered;


                klon.querySelector("#text").innerHTML = mypost.content.rendered;

                container.appendChild(klon);
            });
        }

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

    </script>
</body>

</html>
