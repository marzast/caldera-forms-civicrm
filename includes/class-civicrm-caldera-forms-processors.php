<?php

/**
 * CiviCRM Caldera Forms Processors Class.
 *
 * @since 0.2
 */
class CiviCRM_Caldera_Forms_Processors {

	/**
	 * The processor objects.
	 *
	 * @since 0.2
	 * @access public
	 * @var array $processors An array that hold all processor objects
	 */
	public $processors;

	/**
	 * Enabled CiviCRM components
	 * @since 0.4.1
	 * @access public
	 * @var array $enabled_components Array that holds all CiviCRM enabled components
	 */
	public $enabled_components;

	/**
	 * Enabled CiviCRM extensions
	 * @since 0.4.1
	 * @access public
	 * @var array $enabled_extensions Array that holds all CiviCRM enabled extensions
	 */
	public $enabled_extensions;

	/**
	 * Initialises this object.
	 *
	 * @since 0.2
	 */
	public function __construct() {

		// Get enabled components
		$this->enabled_components = CiviCRM_Caldera_Forms_Helper::get_civicrm_settings('enable_components');
		// Get enabled extensions
		$this->enabled_extensions = CiviCRM_Caldera_Forms_Helper::get_enabled_extensions();

		// set up all our processors
		$this->include_files();
		$this->setup_objects();

	}

	/**
	 * Include processor files.
	 *
	 * @since 0.2
	 */
	private function include_files() {

		// Include processor classes
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/contact/class-contact-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/group/class-group-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/activity/class-activity-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/relationship/class-relationship-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/entity-tag/class-entity-tag-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/address/class-address-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/contribution/class-contribution-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/email/class-email-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/phone/class-phone-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/note/class-note-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/website/class-website-processor.php';
		include CF_CIVICRM_INTEGRATION_PATH . 'processors/im/class-im-processor.php';
		if ( $this->enabled_extensions && in_array( 'org.civicoop.emailapi', $this->enabled_extensions ) )
			include CF_CIVICRM_INTEGRATION_PATH . 'processors/send-email/class-send-email-processor.php';
		if ( in_array( 'CiviCase', $this->enabled_components ) )
			include CF_CIVICRM_INTEGRATION_PATH . 'processors/case/class-case-processor.php';

	}

	/**
	 * Set up processor objects.
	 *
	 * @since 0.2
	 */
	private function setup_objects() {

		// store processors in array
		$this->processors['contact'] = new CiviCRM_Caldera_Forms_Contact_Processor;
		$this->processors['group'] = new CiviCRM_Caldera_Forms_Group_Processor;
		$this->processors['activity'] = new CiviCRM_Caldera_Forms_Activity_Processor;
		$this->processors['contribution'] = new CiviCRM_Caldera_Forms_Contribution_Processor;
		$this->processors['relationship'] = new CiviCRM_Caldera_Forms_Relationship_Processor;
		$this->processors['entity_tag'] = new CiviCRM_Caldera_Forms_Entity_Tag_Processor;
		$this->processors['address'] = new CiviCRM_Caldera_Forms_Address_Processor;
		$this->processors['email'] = new CiviCRM_Caldera_Forms_Email_Processor;
		$this->processors['phone'] = new CiviCRM_Caldera_Forms_Phone_Processor;
		$this->processors['note'] = new CiviCRM_Caldera_Forms_Note_Processor;
		$this->processors['website'] = new CiviCRM_Caldera_Forms_Website_Processor;
		$this->processors['im'] = new CiviCRM_Caldera_Forms_Im_Processor;
		if ( $this->enabled_extensions && in_array( 'org.civicoop.emailapi', $this->enabled_extensions ) )
			$this->processors['send_email'] = new CiviCRM_Caldera_Forms_Send_Email_Processor;
		if ( in_array( 'CiviCase', $this->enabled_components ) )
			$this->processors['case'] = new CiviCRM_Caldera_Forms_Case_Processor;

	}

}
