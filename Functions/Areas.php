<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Areas {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'areas_register_meta_boxes'));
   }

   public function init() {
      $this->areas_post_type();
   }

   public function areas_post_type() {

      $labels = array(
         'name'                => _x( 'Areas de Atuação', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Area', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Areas de Atuação', 'text_domain' ),
         'name_admin_bar'      => __( 'Areas de Atuação', 'text_domain' ),
         'parent_item_colon'   => __( 'Area pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os areas', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo area', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo area', 'text_domain' ),
         'edit_item'           => __( 'Ediar area', 'text_domain' ),
         'update_item'         => __( 'Atualizar area', 'text_domain' ),
         'view_item'           => __( 'Ver area', 'text_domain' ),
         'search_items'        => __( 'Procurar area', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'areas', 'text_domain' ),
         'description'         => __( 'Cadastro dos areas', 'text_domain' ),
         'labels'              => $labels,
         'supports'            => array( 'title', 'editor', ),
         'taxonomies'          => array( ),
         'hierarchical'        => false,
         'public'              => true,
         'show_ui'             => true,
         'show_in_menu'        => true,
         'menu_position'       => 5,
         'show_in_admin_bar'   => true,
         'show_in_nav_menus'   => true,
         'can_export'          => true,
         'has_archive'         => true,
         'exclude_from_search' => false,
         'publicly_queryable'  => true,
         'capability_type'     => 'page',
      );

      register_post_type( 'areas', $args );

   }

   public function areas_register_meta_boxes( $meta_boxes ) {
      $prefix = 'area_';
      $meta_boxes[] = array(
         'id'         => '{$prefix}icone',
         'title'      => 'Código do ícone',
         'post_types' => array( 'areas' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'   => "{$prefix}icone",
               'type' => 'text',
               'name' => null,
            ),
         ),
      );
      
      return $meta_boxes;
   }
}