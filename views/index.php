<!-- Hero Index -->
<section class="heroIndex">
    <!-- Wrapper -->
    <div class="circle"></div>
    <!-- Contenido -->
    <div class="content">
        <div class="textBox">
            <h2>Its not just Cofee<br>Its <span id="type1"></span></h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum, neque aspernatur animi deleniti voluptatum ea non! Recusandae perspiciatis impedit dignissimos saepe, aliquid possimus laudantium quam ab cumque natus repudiandae a.]</p>
            <a href="#">Learn More</a>
        </div>
        <div class="imgBox">
            <img src="<?= getUrl() ?>assets/img/heroIndex/img1.png" class="imgHeroIndex" alt="">
        </div>
    </div>
    <!-- Thumbs -->
    <ul class="thumb">
        <li><img src="<?= getUrl() ?>assets/img/heroIndex/thumb1.png" onclick="imgSlider('<?= getUrl() ?>assets/img/heroIndex/img1.png');changeCircleColor('#017143')" alt=""></li>
        <li><img src="<?= getUrl() ?>assets/img/heroIndex/thumb2.png" onclick="imgSlider('<?= getUrl() ?>assets/img/heroIndex/img2.png');changeCircleColor('#eb7495')" alt=""></li>
        <li><img src="<?= getUrl() ?>assets/img/heroIndex/thumb3.png" onclick="imgSlider('<?= getUrl() ?>assets/img/heroIndex/img3.png');changeCircleColor('#d752b1')" alt=""></li>
    </ul>
    <!-- Redes Sociales -->
    <ul class="sci">
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
    </ul>
</section>

<!-- Main -->
<main>
</main>

<!-- Postear -->
<section class="container mt-5">
    <form action="">
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Deja tu comentario aqui..." id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Que Piensas?</label>
        </div>
        <button type="submit" class="btn btn-primary">Postear</button>
        <a href="<?= URL ?>config/logout.php">
            <div class="texto">
                Cerrar Sesion
            </div>
        </a>
    </form>
</section>
<!-- Posts -->
<section class="container mt-5">
    <div class="row row-cols-auto d-flex justify-content-center">
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card me-3 mb-5 col" style="width: 18rem;">
            <img src="http://c.files.bbci.co.uk/48DD/production/_107435681_perro1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi perro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</section>