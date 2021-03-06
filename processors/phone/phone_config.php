<?php

$phoneFields = civicrm_api3( 'Phone', 'getfields', array(
	'sequential' => 1,
));

$phoneLocationType = civicrm_api3( 'Phone', 'getoptions', array(
	'sequential' => 1,
	'field' => 'location_type_id',
));

$fields = array( 'is_primary', 'is_billing', 'phone', 'phone_numeric', 'phone_type_id' );

?>

<h2><?php _e( 'Contact Link', 'caldera-forms-civicrm' ); ?></h2>
<div id="contact_link" class="caldera-config-group">
	<label><?php _e( 'Link to', 'caldera-forms-civicrm' ); ?></label>
	<div class="caldera-config-field">
		<?php CiviCRM_Caldera_Forms_Helper::contact_link_field() ?>
		<p><?php _e( 'Select which contact you want to link this processor to.', 'caldera-forms-civicrm' ); ?></p>
	</div>
</div>

<hr style="clear: both;" />

<h2><?php _e( 'Phone Location Type', 'caldera-forms-civicrm' ); ?></h2>
<div id="location_type_id" class="caldera-config-group">
	<label><?php _e( 'Phone Location Type', 'caldera-forms-civicrm' ); ?></label>
	<div class="caldera-config-field">
		<select class="block-input field-config" name="{{_name}}[location_type_id]">
		<?php foreach( $phoneLocationType['values'] as $key => $value ) { ?>
			<option value="<?php echo esc_attr( $value['key'] ); ?>" {{#is location_type_id value=<?php echo $value['key']; ?>}}selected="selected"{{/is}}><?php echo esc_html( $value['value'] ); ?></option>
		<?php } ?>
		</select>
	</div>
</div>
<hr style="clear: both;" />

<h2 style="display: inline-block;"><?php _e( 'Phone Fields', 'caldera-forms-civicrm' ); ?></h2>
<?php foreach( $phoneFields['values'] as $key => $value ) {
	if ( in_array( $value['name'], $fields ) ) { ?>
	<div id="<?php echo esc_attr( $value['name'] ); ?>" class="caldera-config-group">
		<label><?php echo esc_html( $value['title'] ); ?></label>
		<div class="caldera-config-field">
		  <?php echo '{{{_field slug="' . $value['name'] . '"}}}'; ?>
		</div>
	</div>
<?php } } ?>

<hr style="clear: both;" />
