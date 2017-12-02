<?php

$relationships = civicrm_api3( 'RelationshipType', 'get', array(
	'sequential' => 1,
	'is_active' => 1,
	'options' => array( 'limit' => 0 ),
));

?>

<div id="relationship_type" class="caldera-config-group">
	<label><?php echo __( 'Relationship Type', 'caldera-forms-civicrm' ); ?></label>
	<div class="caldera-config-field">
		<select class="block-input field-config" name="{{_name}}[relationship_type]">
		<?php foreach( $relationships['values'] as $key => $value ) { ?>
			<option value="<?php echo esc_attr( $value['id'] ); ?>" {{#is relationship_type value=<?php echo $value['id']; ?>}}selected="selected"{{/is}}><?php echo esc_html( '[' . $value['contact_type_a'] . ']' . $value['label_a_b'] . ' - ['. $value['contact_type_b'] . ']' . $value['label_b_a'] ); ?></option>
		<?php } ?>
		</select>
	</div>
</div>

<div id="contact_a" class="caldera-config-group">
	<label><?php _e( 'Contact A', 'caldera-forms-civicrm' ); ?></label>
	<div class="caldera-config-field">
		<select class="block-input field-config" name="{{_name}}[contact_a]">
			<option value="1" {{#is contact_a value=1}}selected="selected"{{/is}}><?php _e( 'Contact 1', 'caldera-forms-civicrm' ); ?></option>
			<option value="2" {{#is contact_a value=2}}selected="selected"{{/is}}><?php _e( 'Contact 2', 'caldera-forms-civicrm' ); ?></option>
			<option value="3" {{#is contact_a value=3}}selected="selected"{{/is}}><?php _e( 'Contact 3', 'caldera-forms-civicrm' ); ?></option>
			<option value="4" {{#is contact_a value=4}}selected="selected"{{/is}}><?php _e( 'Contact 4', 'caldera-forms-civicrm' ); ?></option>
			<option value="5" {{#is contact_a value=5}}selected="selected"{{/is}}><?php _e( 'Contact 5', 'caldera-forms-civicrm' ); ?></option>
			<option value="6" {{#is contact_a value=6}}selected="selected"{{/is}}><?php _e( 'Contact 6', 'caldera-forms-civicrm' ); ?></option>
			<option value="7" {{#is contact_a value=7}}selected="selected"{{/is}}><?php _e( 'Contact 7', 'caldera-forms-civicrm' ); ?></option>
			<option value="8" {{#is contact_a value=8}}selected="selected"{{/is}}><?php _e( 'Contact 8', 'caldera-forms-civicrm' ); ?></option>
			<option value="9" {{#is contact_a value=9}}selected="selected"{{/is}}><?php _e( 'Contact 9', 'caldera-forms-civicrm' ); ?></option>
			<option value="10" {{#is contact_a value=10}}selected="selected"{{/is}}><?php _e( 'Contact 10', 'caldera-forms-civicrm' ); ?></option>
		</select>
	</div>
</div>

<div id="contact_b" class="caldera-config-group">
	<label><?php _e( 'Contact B', 'caldera-forms-civicrm' ); ?></label>
	<div class="caldera-config-field">
		<select class="block-input field-config" name="{{_name}}[contact_b]">
			<option value="1" {{#is contact_b value=1}}selected="selected"{{/is}}><?php _e( 'Contact 1', 'caldera-forms-civicrm' ); ?></option>
			<option value="2" {{#is contact_b value=2}}selected="selected"{{/is}}><?php _e( 'Contact 2', 'caldera-forms-civicrm' ); ?></option>
			<option value="3" {{#is contact_b value=3}}selected="selected"{{/is}}><?php _e( 'Contact 3', 'caldera-forms-civicrm' ); ?></option>
			<option value="4" {{#is contact_b value=4}}selected="selected"{{/is}}><?php _e( 'Contact 4', 'caldera-forms-civicrm' ); ?></option>
			<option value="5" {{#is contact_b value=5}}selected="selected"{{/is}}><?php _e( 'Contact 5', 'caldera-forms-civicrm' ); ?></option>
			<option value="6" {{#is contact_b value=6}}selected="selected"{{/is}}><?php _e( 'Contact 6', 'caldera-forms-civicrm' ); ?></option>
			<option value="7" {{#is contact_b value=7}}selected="selected"{{/is}}><?php _e( 'Contact 7', 'caldera-forms-civicrm' ); ?></option>
			<option value="8" {{#is contact_b value=8}}selected="selected"{{/is}}><?php _e( 'Contact 8', 'caldera-forms-civicrm' ); ?></option>
			<option value="9" {{#is contact_b value=9}}selected="selected"{{/is}}><?php _e( 'Contact 9', 'caldera-forms-civicrm' ); ?></option>
			<option value="10" {{#is contact_b value=10}}selected="selected"{{/is}}><?php _e( 'Contact 10', 'caldera-forms-civicrm' ); ?></option>
		</select>
	</div>
</div>

<!-- Relationship details -->
<?php

$relationshipFieldsResult = civicrm_api3( 'Relationship', 'getfields', array(
	'sequential' => 1,
));

$relationshipFields = array();

foreach ( $relationshipFieldsResult['values'] as $key => $value ) {
 if ( ! in_array( $value['name'], CiviCRM_Caldera_Forms_Helper::$relationship_fields ) ) {
		$relationshipFields[$value['name']] = $value['title'];
 }
}
?>

<hr style="clear: both;" />

<h2><?php _e( 'Relationship fields', 'caldera-forms-civicrm' ); ?></h2>
<?php
	foreach ( $relationshipFields as $key => $value ) { ?>
	<div id="<?php echo esc_attr( $key ); ?>" class="caldera-config-group">
		<label><?php echo esc_html( $value ); ?> </label>
		<div class="caldera-config-field">
			<?php
				echo '{{{_field ';
				if ( $key == 'file_id' ) echo 'type="advanced_file,file" ';
				echo 'slug="' . $key . '"}}}';
			?>
		</div>
	</div>
<?php } ?>

<script>
	jQuery(document).ready( function() {
		jQuery('#source_record_id select').prop( 'disabled', true );
	} );
</script>
