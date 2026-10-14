<?php

use VENTOCOM\Core\Helpers;
?>

</main>

<footer class="footer">
  <div class="footer-wrapper container">
    <img src="<?= Helpers::get_custom_logo_url(); ?>" alt="">
    <p>© <?= date('Y'); ?> Mais e Melhores Mercados</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>