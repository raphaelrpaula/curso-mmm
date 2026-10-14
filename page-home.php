<?php
get_header();

use VENTOCOM\Core\Helpers;
?>

<section class="s-banner">
  <div class="s-banner-wrapper container">
    <div class="banner--txt">
      <h1>Leve o Mais e Melhores Mercados para o seu <span>território</span></h1>
      <p>Formação com respaldo acadêmico da UFRGS e UERGS para fortalecer a comercialização de negócios comunitários,
        povos indígenas, comunidades quilombolas, agricultores familiares e extrativistas.</p>

      <?= Helpers::get_button('Quero levar o curso para minha região', '#', [
        'icon' => 'arrow-right',
      ]) ?>

      <div class="publico-alvo">
        <div class="item">Negócios comunitários</div>
        <div class="item">Povos indígenas</div>
        <div class="item">Comunidades quilombolas</div>
        <div class="item">Agricultores familiares</div>
        <div class="item">Extrativistas</div>
      </div>
    </div>
  </div>
</section>

<section class="s-desafio">
  <div class="s-desafio-wrapper container">
    <div class="desafio--txt">
      <?= Helpers::get_section_title([
        'hat' => 'O desafio',
        'title' => 'Comercializar bem ainda é um desafio para quem vive do território'
      ]); ?>

      <p>Muitos negócios comunitários e agricultores familiares produzem com qualidade, mas encontram barreiras para
        vender, negociar e se relacionar com o mercado. Falta metodologia, apoio técnico e conexão com quem já validou
        esse caminho em campo.</p>
    </div>
    <div class="desafio--img">
      <figure>
        <img src="<?= IMG_PATH_URL . 'img/img-desafio.webp'; ?>" alt="">
      </figure>
    </div>
  </div>
</section>

<section class="s-curso">
  <div class="s-curso-wrapper container">
    <?= Helpers::get_section_title([
      'hat' => 'O curso',
      'title' => 'Uma formação pensada para a realidade dos territórios',
      'subtitle' => 'O Mais e Melhores Mercados oferece ferramentas práticas para ampliar o acesso a mercados de forma estratégica. Ao longo da formação, cada participante constrói um <b>Plano de Ação de Mercados</b> voltado ao seu próprio contexto, com apoio de especialistas e mentorias coletivas.'
    ]); ?>

    <div class="curso--content">
      <figure>
        <img src="<?= IMG_PATH_URL . 'img/img-curso.webp'; ?>" alt="">
      </figure>

      <div class="txt">
        <div class="item">
          <div class="item--txt">
            <p class="title">horas</p>
            <p>Carga horária total</p>
          </div>
        </div>
        <div class="item">
          <div class="item--txt">
            <p class="title">módulos</p>
            <p>Conteúdo estruturado</p>
          </div>
        </div>
        <div class="item">
          <div class="item--txt">
            <p class="title">prático</p>
            <p>Plano de ação próprio</p>
          </div>
        </div>
        <div class="item destaque">
          <div class="item--txt">
            <p class="title">Certificação pela UFRGS</p>
            <p>Emitida ao final da formação</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-green">
  <?php
  $args = [
    'post_type' => 'modulos',
    'posts_per_page' => 10,
    'order' => 'DESC',
  ];

  $query = new WP_Query($args);
  if ($query->have_posts()) { ?>
    <div class="s-modulos">
      <div class="s-modulos-wrapper container">
        <?= Helpers::get_section_title([
          'hat' => 'Conteúdo',
          'title' => 'Módulos organizados'
        ]); ?>

        <div class="modulos--itens">
          <?php
          $i = 1;
          while ($query->have_posts()) {
            $query->the_post();
          ?>
            <div class="modulo">
              <span class="pos"><?= $i < 5 ? '0' . $i : '+'; ?></span>
              <p class="title"><?= get_the_title(); ?></p>
              <p><?= get_the_content(); ?></p>
            </div>
          <?php
            $i++;
          }
          wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="s-contratacao">
    <div class="s-contratacao-wrapper container">
      <div class="contratacao--txt">
        <?= Helpers::get_section_title([
          'hat' => 'Formato de contratação',
          'title' => 'Como funciona para a sua cidade ou cooperativa',
          'subtitle' => 'A formação pode ser levada até o seu território com apoio total da equipe, do planejamento à certificação final.'
        ]); ?>

        <div class="passos">
          <div class="passo">
            <span class="pos">1</span>
            <div class="passo--txt">
              <p class="title">Preencha o formulário</p>
              <p>Informe quantos participantes e o contexto da sua região.</p>
            </div>
          </div>
          <div class="passo">
            <span class="pos">2</span>
            <div class="passo--txt">
              <p class="title">Proposta personalizada</p>
              <p>Em até 3 dias úteis você recebe uma proposta sob medida.</p>
            </div>
          </div>
          <div class="passo">
            <span class="pos">3</span>
            <div class="passo--txt">
              <p class="title">Planejamento conjunto</p>
              <p>Definimos datas, logística e formato com você.</p>
            </div>
          </div>
          <div class="passo">
            <span class="pos">1</span>
            <div class="passo--txt">
              <p class="title">Formação e certificação</p>
              <p>Seu território recebe a formação completa com suporte acadêmico.</p>
            </div>
          </div>
        </div>

        <?= Helpers::get_button('Solicitar proposta', '#', [
          'icon' => 'arrow-right',
        ]); ?>
      </div>

      <div class="contratacao--img">
        <figure>
          <img src="<?= IMG_PATH_URL . 'img/img-contratacao.webp'; ?>" alt="">
        </figure>
      </div>
    </div>
  </div>
</section>

<section class="s-formulario">
  <div class="s-formulario-wrapper container">
    <div class="formulario--txt">
      <img src="<?= Helpers::get_custom_logo_url(); ?>" alt="">

      <?= Helpers::get_section_title([
        'title' => 'Vamos fortalecer o seu território?'
      ]); ?>

      <p>Preencha o formulário e nossa equipe entrará em contato para apresentar uma proposta para a sua cidade ou
        cooperativa.</p>
    </div>

    <div class="formulario--form">
      <?= do_shortcode('[contact-form-7 id="5d0223e" title="Solicitar proposta"]'); ?>
    </div>
  </div>
</section>

<?php
get_footer();
