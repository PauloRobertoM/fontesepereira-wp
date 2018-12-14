<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Associados {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'associados_register_meta_boxes'));
   }

   public function init() {
      $this->associados_post_type();
   }

   public function associados_post_type() {

      $labels = array(
         'name'                => _x( 'Associados', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Associado', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Associados', 'text_domain' ),
         'name_admin_bar'      => __( 'Associados', 'text_domain' ),
         'parent_item_colon'   => __( 'Associado pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os associados', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo associado', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo associado', 'text_domain' ),
         'edit_item'           => __( 'Ediar associado', 'text_domain' ),
         'update_item'         => __( 'Atualizar associado', 'text_domain' ),
         'view_item'           => __( 'Ver associado', 'text_domain' ),
         'search_items'        => __( 'Procurar associado', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'associados', 'text_domain' ),
         'description'         => __( 'Cadastro dos associados', 'text_domain' ),
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

      register_post_type( 'associados', $args );

   }

   public function associados_register_meta_boxes( $meta_boxes ) {
      $prefix = 'associado_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto",
         'title'      => 'Foto Principal do Associado',
         'post_types' => array( 'associados' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}foto",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto Principal',
               'max_file_uploads' => 1,
            ),
         )
      );
      $meta_boxes[] = array(
         'id'         => '{$prefix}numeracao',
         'title'      => 'Número OAB',
         'post_types' => array( 'associados' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'   => "{$prefix}numeracao",
               'type' => 'text',
               'name' => null,
            ),
         ),
      );
      
      return $meta_boxes;
   }

}