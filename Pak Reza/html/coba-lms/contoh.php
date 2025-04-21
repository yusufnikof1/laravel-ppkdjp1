<section class="ftco-section ftco-project" id="projects-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Projek</h1>
                    <h2 class="mb-4">Projek Kami</h2>
                    <p>Hasil karya sebagai Programmer</p>
                </div>
            </div>
            <div class="row">
                <?php
                $colClass = ["col-md-4", "col-md-8"];
                $index = 0;
                ?>
                <?php foreach ($projects as $index => $project) : ?>
                    <?php $col = $colClass[$index % 2]; ?>
                    <div class="<?php echo $col ?> mb-3">
                        <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?php echo "assets/uploads/" . $project['foto'] ?>);">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3><a href="#"><?php echo $project['nama'] ?></a></h3>
                                <span><?php echo $project['kategori'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
