<?php

/*
   Class: PawFriendsMikadoClassTaxonomyField
   A class that initializes PawFriendsMikadoClass Taxonomy Field
*/

class PawFriendsMikadoClassTaxonomyField implements iPawFriendsMikadoInterfaceRender {
	private $type;
	private $name;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	private $hidden_property;
	private $hidden_values = array();
	
	function __construct( $type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array() ) {
		$this->type            = $type;
		$this->name            = $name;
		$this->label           = $label;
		$this->description     = $description;
		$this->options         = $options;
		$this->args            = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values   = $hidden_values;
		add_filter( 'pawfriends_mikado_filter_taxonomy_fields', array( $this, 'addFieldForEditSave' ) );
	}
	
	public function addFieldForEditSave( $names ) {
		//for icon type of field add additonal icon font family based names for saving
		if ( $this->type == 'icon' ) {
			$icons_collections = pawfriends_mikado_icon_collections()->getIconCollectionsKeys();
			
			foreach ( $icons_collections as $icons_collection ) {
				$icons_param = pawfriends_mikado_icon_collections()->getIconCollectionParamNameByKey( $icons_collection );
				
				$names[] = $this->name . '_' . $icons_param;
			}
		}
		
		$names[] = $this->name;
		
		return $names;
	}
	
	public function render( $factory ) {
		$hidden = false;
		
		if ( isset( $_GET['tag_ID'] ) ) {
			if ( ! empty( $this->hidden_property ) ) {
				foreach ( $this->hidden_values as $value ) {
					if ( get_term_meta( $_GET['tag_ID'], $this->hidden_property, true ) == $value ) {
						$hidden = true;
					}
				}
			}
		}
		
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class PawFriendsMikadoClassTaxonomyFieldType {
	abstract public function render( $name, $label = "", $description = "", $options = array(), $args = array() );
}

class PawFriendsMikadoClassTaxonomyFieldText extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="">
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$value       = get_term_meta( $_GET['tag_ID'], $name, true );
			$field_class = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row" valign="top">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php echo ! empty( $value ) ? esc_attr( $value ) : ''; ?>">
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldTextArea extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<textarea name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" rows="5"></textarea>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$value       = get_term_meta( $_GET['tag_ID'], $name, true );
			$field_class = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row" valign="top">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<textarea name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" rows="5"><?php echo ! empty( $value ) ? esc_html( $value ) : ''; ?></textarea>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldImage extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="mkdf-tax-custom-media-url" value="">
				<div class="mkdf-tax-image-wrapper"></div>
				<p>
					<input type="button" class="button button-secondary mkdf-tax-media-add" name="mkdf-tax-media-add" value="<?php esc_attr_e( 'Add Image', 'pawfriends' ); ?>"/>
					<input type="button" class="button button-secondary mkdf-tax-media-remove" name="mkdf-tax-media-remove" value="<?php esc_attr_e( 'Remove Image', 'pawfriends' ); ?>"/>
				</p>
			</div>
			<?php
		} else {
			global $taxonomy;
			$image_id    = get_term_meta( $_GET['tag_ID'], $name, true );
			$field_class = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $image_id ); ?>" class="mkdf-tax-custom-media-url">
					<div class="mkdf-tax-image-wrapper">
						<?php if ( $image_id ) { ?>
							<?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
						<?php } ?>
					</div>
					<p>
						<input type="button" class="button button-secondary mkdf-tax-media-add" name="mkdf-tax-media-add" value="<?php esc_attr_e( 'Add Image', 'pawfriends' ); ?>"/>
						<input data-termid="<?php echo esc_attr( $_GET['tag_ID'] ); ?>" data-taxonomy="<?php echo esc_attr( $taxonomy ); ?>" type="button" class="button button-secondary mkdf-tax-media-remove" name="mkdf-tax-media-remove" value="<?php esc_attr_e( 'Remove Image', 'pawfriends' ); ?>"/>
					</p>
				</td>
			</tr>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldSelect extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		
		$select2 = '';
		if ( isset( $args['select2'] ) ) {
			$select2 = 'mkdf-select2';
		}
		
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<select class="<?php echo esc_attr( $select2 ) ?> form-control mkdf-form-element<?php if ( $dependence ) { echo " dependence"; } ?>" name="<?php echo esc_attr( $name ); ?>"
					<?php foreach ( $show as $key => $value ) { ?>
						data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
					<?php } ?>
					<?php foreach ( $hide as $key => $value ) { ?>
						data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
					<?php } ?>
					    id="<?php echo esc_attr( $name ); ?>">
					<?php foreach ( $options as $key => $value ) {
						if ( $key == "-1" ) {
							$key = "";
						} ?>
						<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
					<?php } ?>
				</select>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$selected_value = get_term_meta( $_GET['tag_ID'], $name, true );
			$field_class    = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row" valign="top">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<select name="<?php echo esc_attr( $name ); ?>" class="<?php echo esc_attr( $select2 ) ?> mkdf-form-element<?php if ( $dependence ) { echo " dependence"; } ?>"
						<?php foreach ( $show as $key => $value ) { ?>
							data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
						<?php } ?>
						<?php foreach ( $hide as $key => $value ) { ?>
							data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
						<?php } ?>
						    id="<?php echo esc_attr( $name ); ?>">
						<?php foreach ( $options as $key => $value ) {
							if ( $key == "-1" ) {
								$key = "";
							} ?>
							<option <?php if ( $selected_value == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
						<?php } ?>
					</select>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldSelectBlank extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		
		$select2 = '';
		if ( isset( $args['select2'] ) ) {
			$select2 = 'mkdf-select2';
		}
		
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<select class="<?php echo esc_attr( $select2 ) ?> form-control mkdf-form-element<?php if ( $dependence ) { echo " dependence"; } ?>" name="<?php echo esc_attr( $name ); ?>"
					<?php foreach ( $show as $key => $value ) { ?>
						data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
					<?php } ?>
					<?php foreach ( $hide as $key => $value ) { ?>
						data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
					<?php } ?>
					    id="<?php echo esc_attr( $name ); ?>">
					<?php if ( isset( $args['first_empty'] ) && $args['first_empty'] ) { ?>
						<option selected='selected' value=""></option>
					<?php } ?>
					<?php foreach ( $options as $key => $value ) {
						if ( $key == "-1" ) {
							$key = "";
						} ?>
						<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
					<?php } ?>
				</select>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$selected_value = get_term_meta( $_GET['tag_ID'], $name, true );
			$field_class    = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row" valign="top">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<select name="<?php echo esc_attr( $name ); ?>" class="<?php echo esc_attr( $select2 ) ?> mkdf-form-element<?php if ( $dependence ) { echo " dependence"; } ?>"
						<?php foreach ( $show as $key => $value ) { ?>
							data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
						<?php } ?>
						<?php foreach ( $hide as $key => $value ) { ?>
							data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
						<?php } ?>
						    id="<?php echo esc_attr( $name ); ?>">
						<option <?php if ( $selected_value == "" ) {
							echo "selected='selected'";
						} ?> value=""></option>
						<?php foreach ( $options as $key => $value ) {
							if ( $key == "-1" ) {
								$key = "";
							} ?>
							<option <?php if ( $selected_value == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
						<?php } ?>
					</select>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldCheckBoxGroup extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		if ( ! ( is_array( $options ) && count( $options ) ) ) {
			return;
		}
		
		$selected_value = get_term_meta( $_GET['tag_ID'], $name, true );
		
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<div class="mkdf-tax-checkbox-group">
					<?php foreach ( $options as $option_key => $option_label ) : ?>
						<?php
						if ( $option_label !== '' ) {
							$i            = 1;
							$checked      = is_array( $selected_value ) && in_array( $option_key, $selected_value );
							$checked_attr = $checked ? 'checked' : '';
							?>
							<div class="mkdf-tax-checkbox-item">
								<label>
									<input <?php echo esc_attr( $checked_attr ); ?> type="checkbox" id="<?php echo esc_attr( $name . $option_key ) . '-' . $i; ?>" value="<?php echo esc_attr( $option_key ); ?>" name="<?php echo esc_attr( $name . '[]' ); ?>" />
									<label for="<?php echo esc_attr( $name . $option_key ) . '-' . $i; ?>"><?php echo esc_html( $option_label ); ?></label>
								</label>
							</div>
							<?php
							$i ++;
						}
					endforeach; ?>
				</div>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$field_class = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row" valign="top">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<div class="mkdf-tax-checkbox-group">
						<?php foreach ( $options as $option_key => $option_label ) : ?>
							<?php
							if ( $option_label !== '' ) {
								$i            = 1;
								$checked      = is_array( $selected_value ) && in_array( $option_key, $selected_value );
								$checked_attr = $checked ? 'checked' : '';
								?>
								<div class="mkdf-tax-checkbox-item">
									<label>
										<input <?php echo esc_attr( $checked_attr ); ?> type="checkbox" id="<?php echo esc_attr( $name . $option_key ) . '-' . $i; ?>" value="<?php echo esc_attr( $option_key ); ?>" name="<?php echo esc_attr( $name . '[]' ); ?>" />
										<label for="<?php echo esc_attr( $name . $option_key ) . '-' . $i; ?>"><?php echo esc_html( $option_label ); ?></label>
									</label>
								</div>
								<?php
								$i ++;
							}
						endforeach; ?>
					</div>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldIcon extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$options           = pawfriends_mikado_icon_collections()->getIconCollectionsEmpty();
		$icons_collections = pawfriends_mikado_icon_collections()->getIconCollectionsKeys();
		
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="dependence">
					<?php foreach ( $options as $option => $key ) { ?>
						<option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_attr( $key ); ?></option>
					<?php } ?>
				</select>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php foreach ( $icons_collections as $icons_collection ) {
				$icons_param = pawfriends_mikado_icon_collections()->getIconCollectionParamNameByKey( $icons_collection );
				?>
				<div class="form-field mkd-icon-collection-holder mkdf-hide" data-icon-collection="<?php echo esc_attr( $icons_collection ); ?>">
					<label for="<?php echo esc_attr( $name ) . '_icon'; ?>"><?php esc_html_e( 'Icon', 'pawfriends' ); ?></label>
					<select name="<?php echo esc_attr( $name . '_' . $icons_param ) ?>" id="<?php echo esc_attr( $name . '_' . $icons_param ) ?>">
						<?php
						$icons = pawfriends_mikado_icon_collections()->getIconCollection( $icons_collection );
						foreach ( $icons->icons as $option => $key ) { ?>
							<option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_attr( $key ); ?></option>
						<?php } ?>
					</select>
				</div>
			<?php } ?>
			<?php
		} else {
			$icon_pack   = get_term_meta( $_GET['tag_ID'], $name, true );
			$field_class = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="dependence">
						<?php foreach ( $options as $option => $key ) { ?>
							<option value="<?php echo esc_attr( $option ); ?>" <?php if ( $option == $icon_pack ) { echo 'selected'; } ?>><?php echo esc_attr( $key ); ?></option>
						<?php } ?>
					</select>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php foreach ( $icons_collections as $icons_collection ) {
				$icons_param = pawfriends_mikado_icon_collections()->getIconCollectionParamNameByKey( $icons_collection );
				$field_class = $icon_pack == $icons_collection ? 'mkdf-table-row' : 'mkdf-hide';
				?>
				<tr class="form-field mkd-icon-collection-holder <?php echo esc_attr( $field_class ); ?>" data-icon-collection="<?php echo esc_attr( $icons_collection ); ?>">
					<th scope="row"><?php esc_html_e( 'Icon', 'pawfriends' ); ?></th>
					<td>
						<select name="<?php echo esc_attr( $name . '_' . $icons_param ) ?>" id="<?php echo esc_attr( $name . '_' . $icons_param ) ?>">
							<?php
							$icons       = pawfriends_mikado_icon_collections()->getIconCollection( $icons_collection );
							$active_icon = get_term_meta( $_GET['tag_ID'], $name . '_' . $icons_param, true );
							foreach ( $icons->icons as $option => $key ) { ?>
                                <option value="<?php echo esc_attr( $key ); ?>" <?php if ( $key == $active_icon ) { echo 'selected'; } ?>><?php echo esc_attr( $option ); ?></option>
                            <?php } ?>
						</select>
					</td>
				</tr>
			<?php } ?>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldColor extends PawFriendsMikadoClassTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="" class="mkdf-taxonomy-color-field">
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$value       = get_term_meta( $_GET['tag_ID'], $name, true );
			$field_class = $hidden ? 'mkdf-hide' : '';
			?>
			<tr class="form-field <?php echo esc_attr( $field_class ); ?>">
				<th scope="row" valign="top">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ) ? esc_attr( $value ) : ''; ?>" class="mkdf-taxonomy-color-field">
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class PawFriendsMikadoClassTaxonomyFieldFactory {
	public function render( $field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		switch ( strtolower( $field_type ) ) {
			case 'text':
				$field = new PawFriendsMikadoClassTaxonomyFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'textarea':
				$field = new PawFriendsMikadoClassTaxonomyFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'image':
				$field = new PawFriendsMikadoClassTaxonomyFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'select':
				$field = new PawFriendsMikadoClassTaxonomyFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'selectblank':
				$field = new PawFriendsMikadoClassTaxonomyFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'checkboxgroup':
				$field = new PawFriendsMikadoClassTaxonomyFieldCheckBoxGroup();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'icon':
				$field = new PawFriendsMikadoClassTaxonomyFieldIcon();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'color':
				$field = new PawFriendsMikadoClassTaxonomyFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			default:
				break;
		}
	}
}
