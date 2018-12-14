<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Escritorios {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'escritorios_register_meta_boxes'));
   }

   public function init() {
      $this->escritorios_post_type();
   }

   public function escritorios_post_type() {

      $labels = array(
         'name'                => _x( 'O Escritorio', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'O Escritorio', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'O Escritorio', 'text_domain' ),
         'name_admin_bar'      => __( 'O Escritorio', 'text_domain' ),
         'parent_item_colon'   => __( 'O Escritorio pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os escritorios', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo escritorio', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo escritorio', 'text_domain' ),
         'edit_item'           => __( 'Ediar escritorio', 'text_domain' ),
         'update_item'         => __( 'Atualizar escritorio', 'text_domain' ),
         'view_item'           => __( 'Ver escritorio', 'text_domain' ),
         'search_items'        => __( 'Procurar escritorio', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'escritorios', 'text_domain' ),
         'description'         => __( 'Cadastro dos escritorios', 'text_domain' ),
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

      register_post_type( 'escritorios', $args );

   }

   public function escritorios_register_meta_boxes( $meta_boxes ) {
      $prefix = 'escritorio_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto",
         'title'      => 'Foto Principal do Escritorio',
         'post_types' => array( 'escritorios' ),
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
         'id'         => "{$prefix}fotos",
         'title'      => 'Galeria',
         'post_types' => array( 'escritorios' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}fotos",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar fotos de Galeria',
               'max_file_uploads' => 10,
            ),
         )
      );
      
      return $meta_boxes;
   }

}