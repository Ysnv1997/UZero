<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Switcher
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_switcher extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();
    $label = ( isset( $this->field['label'] ) ) ? '<div class="cs-text-desc">'. $this->field['label'] . '</div>' : '';
    echo '<label><input type="checkbox" name="'. $this->element_name() .'" value="1"'. $this->element_class() . $this->element_attributes() . checked( $this->element_value(), 1, false ) .'/><em data-on="'. esc_html__( 'on', 'cs-framework' ) .'" data-off="'. esc_html__( 'off', 'cs-framework' ) .'"></em><span></span></label>' . $label;
    echo $this->element_after();

  }

}
