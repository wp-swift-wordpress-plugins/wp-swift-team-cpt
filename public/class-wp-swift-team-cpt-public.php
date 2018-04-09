<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/wp-swift-wordpress-plugins
 * @since      1.0.0
 *
 * @package    Wp_Swift_Team_Cpt
 * @subpackage Wp_Swift_Team_Cpt/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Swift_Team_Cpt
 * @subpackage Wp_Swift_Team_Cpt/public
 * @author     Gary Swift <garyswiftmail@gmail.com>
 */
class Wp_Swift_Team_Cpt_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode( 'team', array($this, 'team_func') );
		add_shortcode( 'teams', array($this, 'teams_func') );
	}

	// [team department="investment"]
	public function team_func( $atts ) {
	    $a = shortcode_atts( array(
	        'department' => null,
	        'layout' => 'rows'
	    ), $atts );
        $options = get_option( 'wp_swift_team_member_cpt_settings' );
        $args = array( 
            'post_type' => 'team_member', 
            'posts_per_page' => 20, 
			'orderby' => 'menu_order',
			'order' => 'ASC',               
        );
        if (isset($a['department']) && $a['department']) {
        	$department = $a['department'];
 
        	$department = get_term_by('slug', $department, 'department');
        	if (isset($department->term_id)) {
		        $args["tax_query"] = array(
			        array(
			            'taxonomy' => 'department',
			            'terms' => $department->term_id,
		        	),
		        );		        		
        	}	        	
        }

        $html='';
        $posts = get_posts($args);
        if( $posts ) : 
			ob_start();

			if ($a['layout'] === 'grid') { ?>
				
				<div class="grid-layout">
					<?php include plugin_dir_path( __FILE__ ) . 'partials/wp-swift-team-cpt-public-display-grid.php'; ?>
				</div>
				<?php
			}
			else {
				include plugin_dir_path( __FILE__ ) . 'partials/wp-swift-team-cpt-public-display.php';
			}
			$html .= ob_get_contents();
			ob_end_clean();		
        endif;// End $posts check

		return $html;
	}


	// [teams]
	public function teams_func( $atts ) {

		$departments = array(
			'investment' => 'Investment Team',
			'admin' => 'Admin Team',	
			'external' => 'External Directors',
			
		);
	    $a = shortcode_atts( array(
	        'tabs' => false
	    ), $atts );		

	    $html = '';
	    if ($a["tabs"]) {
	    	$i = 0;
		    $tabs = '';
		    $tab_sections = '';
		    $headers = '';	    	
		    foreach ($departments as $key => $department) {
		    	$i++;
		    	$headers .= '<h2>'.$department.'</h2>';
		    	$tabs .= $this->tabs($i, $department);
		    	$team = $this->team_func( array( "department" => $key, "layout" => "grid" ) ); 	
		    	$tab_sections .= $this->tab_sections($i, $department, $team);
		    }
		    $html = $this->wrap_tabs($tabs, $tab_sections);	    	
	    }
	    else {
		    foreach ($departments as $key => $department) {
		    	$html .= '<h2>'.$department.'</h2>';
		    	$html .= $this->team_func( array( "department" => $key) ); 	
		    }   	    	
	    }
		return $html;
	}

	private function wrap_tabs($tabs, $tab_sections) {

		ob_start();
		?>
			<div class="wp-swift-tabs">
				<?php
					echo $tabs;
					echo $tab_sections;
				?>
			</div>
		<?php
		$html = ob_get_contents();
		ob_end_clean();
		
		return $html;		
	}
	private function tabs($i, $department) {

		ob_start();
		?>
			<input id="tab<?php echo $i ?>" class="tab-input" type="radio" name="tabs"<?php if ($i === 1) echo ' checked'; ?>>
  			<label for="tab<?php echo $i ?>" class="tab-label"><?php echo $department ?></label>
		<?php
		$html = ob_get_contents();
		ob_end_clean();
		
		return $html;		
	}

	private function tab_sections($i, $department, $team) {

		ob_start();
		?>
		   	<section class="tab-section" id="content<?php echo $i ?>">
		    	<?php echo $team; ?>
		  	</section> 
		<?php
		$html = ob_get_contents();
		ob_end_clean();
		
		return $html;		
	}	
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Swift_Team_Cpt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Swift_Team_Cpt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$options = get_option( 'wp_swift_team_member_cpt_settings' );
		if (isset($options['wp_swift_team_member_cpt_checkbox_load_css'])) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-swift-team-cpt-public.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Swift_Team_Cpt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Swift_Team_Cpt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$options = get_option( 'wp_swift_team_member_cpt_settings' );
		if (isset($options['wp_swift_team_member_cpt_checkbox_load_javascript'])) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-swift-team-cpt-public.js', array( 'jquery' ), $this->version, false );
		}
	}

}
