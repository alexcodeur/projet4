<div class="row biographie">
    <div class="col-lg-12">
        <div class="col-lg-4" style="text-align: center;">
            <img class="jean" src="Web/Public/images/jean.jpg" alt="Jean Forteroche">
        </div>
        <div class="col-lg-8">
            <p class="text-bio">
                Bienvenue chers lecteur, voici mon nouveau roman "Billet simple pour l'Alaska". Bonne lecture, n'hésitez pas à laisser des
                commentaires.
            </p>
        </div>
    </div>
</div>

<div class="first-scroll">
    <?php
    foreach ($listeChapter as $chapter)
    {
        ?>
        <div class="chapter-container">
            <div class="chapter-index">
                <h2 class="title-front-index">
                    <br />
                    <a href="chapter-<?= $chapter['id'] ?>"><?= htmlspecialchars($chapter['title']) ?></a>
                </h2>
                <div>
                    <p><?= nl2br(htmlspecialchars_decode($chapter['article'])) ?></p>
                    <br />
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<br />
<div class="paginate">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg">
            <?php
            for ($i = 1; $i <= $numPageView; $i++)
            {
                ?>
                <li class="page-item"><a href="accueil-<?= $i ?>"><?= $i ?></a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>