<?php

namespace VENTOCOM\Core;

class NavMenu
{
  /**
   * Registra os hooks de ação e filtro no WordPress
   */
  public function __construct()
  {
    // Adiciona o campo customizado no painel (Aparência > Menus)
    add_action('wp_nav_menu_item_custom_fields', [$this, 'render_custom_fields'], 10, 4);

    // Salva o valor do campo ao salvar o menu
    add_action('wp_update_nav_menu_item', [$this, 'save_custom_fields'], 10, 2);

    // Injeta as classes no elemento <a>
    add_filter('nav_menu_link_attributes', [$this, 'filter_link_attributes'], 10, 4);

    // Injeta a classe no elemento <li>
    add_filter('nav_menu_css_class', [$this, 'filter_item_classes'], 10, 4);
  }

  /**
   * Renderiza o checkbox "Exibir como botão" na edição do item do menu
   */
  public function render_custom_fields(int $item_id, object $item, int $depth, object $args): void
  {
    $is_button = (bool) get_post_meta($item_id, '_menu_item_is_button', true);
    wp_nonce_field('vtc_nav_menu_nonce', 'vtc_nav_menu_nonce_field');
?>
    <p class="field-is-button description description-wide" style="margin: 8px 0;">
      <label for="edit-menu-item-is-button-<?= $item_id; ?>">
        <input type="checkbox" id="edit-menu-item-is-button-<?= $item_id; ?>" name="menu_item_is_button[<?= $item_id; ?>]"
          value="1" <?= checked($is_button, true, false); ?> />
        <strong><?= esc_html__('Exibir como botão', 'ventocom'); ?></strong>
      </label>
    </p>
<?php
  }

  /**
   * Salva o metadado do item de menu
   */
  public function save_custom_fields(int $menu_id, int $menu_item_db_id): void
  {
    // Verifica o nonce de segurança
    if (
      !isset($_POST['vtc_nav_menu_nonce_field']) ||
      !wp_verify_nonce($_POST['vtc_nav_menu_nonce_field'], 'vtc_nav_menu_nonce')
    ) {
      return;
    }

    // Se o checkbox foi marcado, salva como '1', caso contrário apaga o meta
    if (!empty($_POST['menu_item_is_button'][$menu_item_db_id])) {
      update_post_meta($menu_item_db_id, '_menu_item_is_button', 1);
    } else {
      delete_post_meta($menu_item_db_id, '_menu_item_is_button');
    }
  }

  /**
   * Adiciona as classes do botão diretamente na tag <a>
   */
  public function filter_link_attributes(array $atts, object $item, object $args, int $depth): array
  {
    $is_button = (bool) get_post_meta($item->ID, '_menu_item_is_button', true);

    if ($is_button) {
      $existing_classes = !empty($atts['class']) ? explode(' ', $atts['class']) : [];

      // Define a classe base do botão (ex: .btn)
      $button_classes = ['btn', 'btn--menu'];

      // Mescla sem duplicar
      $merged_classes = array_unique(array_merge($existing_classes, $button_classes));

      $atts['class'] = implode(' ', $merged_classes);
    }

    return $atts;
  }

  /**
   * Adiciona uma classe no elemento pai <li> para ajudar na estilização do layout
   */
  public function filter_item_classes(array $classes, object $item, object $args, int $depth): array
  {
    $is_button = (bool) get_post_meta($item->ID, '_menu_item_is_button', true);

    if ($is_button) {
      $classes[] = 'menu-item-btn';
    }

    return $classes;
  }
}
